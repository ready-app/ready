<?php

namespace App\Http\Controllers;

use App\Http\Requests\TermStoreRequest;
use App\Models\Term;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TermController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function index() {
        return inertia('admin/TermsPage', [
            'terms' => Term::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function create() {
        return inertia('admin/NewTermPage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TermStoreRequest $request
     * @return RedirectResponse
     */
    public function store(TermStoreRequest $request) {
        $term = new Term($request->validated());
        if ($term->save()) {
            return redirect(route('terms.index'))->with('success', 'New term created successfully');
        }
        return redirect()->back()->with('error', 'Failed to create term');
    }

    /**
     * Display the specified resource.
     *
     * @param Term $term
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function show(Term $term) {
        return inertia('admin/TermPage', [
            'term' => $term
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TermStoreRequest $request
     * @param Term $term
     * @return RedirectResponse
     */
    public function update(TermStoreRequest $request, Term $term) {
        $term->fill($request->validated());
        if ($term->save()) {
            return redirect(route('terms.index'))->with('success', 'Term edited successfully');
        }
        return redirect()->back()->with('error', 'Failed to edit term');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Term $term
     * @return RedirectResponse
     */
    public function destroy(Term $term) {
        if ($term->delete()) {
            return redirect(route('terms.index'))->with('success', 'Term deleted successfully');
        }
        return redirect()->back()->with('error', 'Term failed to delete');
    }
}
