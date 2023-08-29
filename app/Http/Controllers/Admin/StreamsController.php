<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Streams\StreamsRequest;
use App\Models\Stream;
use App\Services\Admin\StreamService;
use Illuminate\Http\Request;

class StreamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $streams = Stream::get();
        return view('admin.pages.streams.index')->with(['streams' => $streams]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.pages.streams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StreamsRequest $request, StreamService $streamService, Stream $stream)
    {
        //
        //dd($request);
        $streamService->create($request, $stream);
        return redirect()->route('streams');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $streams = Stream::where('id', $id)->first();
        return view('admin.pages.streams.edit')->with(['stream' => $streams]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StreamsRequest $request, string $id, StreamService $streamService)
    {
        //
        $streamService->update($request, $id);
        return redirect()->route('streams')->with(
            'success',
            'stream edited successfully.'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the Stream model by the provided $id and delete it
        $stream = Stream::findOrFail($id);
        $stream->delete();
    
        return redirect()->route('streams')->with(
            'success',
            'Stream deleted successfully'
        );
    }    
}
