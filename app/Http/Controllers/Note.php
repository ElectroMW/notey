<?php

namespace App\Http\Controllers;

use App\Models\Note as NoteModel;
use App\Models\User as UserModel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Throwable;

class Note extends Controller
{
    protected array $note_validation_rules = [
        'note_body' => ['required', 'max:65535'],
        'is_important' => ['sometimes', 'accepted']
    ];

    public function index(): Factory|View|Application
    {
        /** @var UserModel $user */
        $user = Auth::user();
        $notes = $user->Notes()->orderByDesc('is_important')->get();
        return view('index')->with(['notes' => $notes, 'users_name' => $user->name]);
    }

    public function getAdd(Request $request): Factory|View|Application
    {
        return view('notes.add');
    }

    /**
     * @throws Throwable
     */
    public function postAdd(Request $request): View|Factory|RedirectResponse|Application
    {
        $validator = Validator::make($request->only(['note_body', 'is_important']), $this->note_validation_rules);
        if ($validator->fails()) {
            return view('notes.add')
                ->with([
                        'error_messages' => $validator->getMessageBag()->all(),
                        'note_body' => $request->get('note_body'),
                        'is_important' => $request->get('is_important')]
                );
        }

        $note = new NoteModel([
            'note_body' => $request->get('note_body'),
            'is_important' => (bool)$request->get('is_important') ?? false,
            'user_id' => Auth::user()->getKey()
        ]);
        $note->saveOrFail();

        return Redirect::route('index');
    }

    public function getEdit(NoteModel $note): Factory|View|Application
    {
        return view('notes.edit')
            ->with(['note' => $note, 'note_body' => $note->note_body, 'is_important' => $note->is_important]);
    }

    /**
     * @throws Throwable
     */
    public function postEdit(Request $request, NoteModel $note): View|Factory|RedirectResponse|Application
    {
        $validator = Validator::make($request->only(['note_body', 'is_important']), $this->note_validation_rules);
        if ($validator->fails()) {
            return view('notes.edit')
                ->with([
                        'error_messages' => $validator->getMessageBag()->all(),
                        'note_body' => $request->get('note_body'),
                        'is_important' => $request->get('is_important')
                    ]);
        }
        $note->note_body = $request->get('note_body');
        $note->is_important = (bool) $request->get('is_important');
        $note->saveOrFail();

        return Redirect::route('index');
    }
}
