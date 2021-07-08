<?php

namespace App\Listeners;

use App\Models\File;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProcessFile
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if ($event->request->method() === 'POST') {
            $this->handleCreated($event);
        } elseif ($event->request->method() === 'PATCH') {
            $this->handleUpdated($event);
        }
    }

    private function handleCreated($event)
    {
        $file = $event->request->file('file');
        $original_name = $file->getClientOriginalName();

        //!! Staging
        // $directory_name = $file->store('files');

        // //!! Testing
        $directory_name = $file->store($original_name, 'files');

        $file = new File();
        $file->original_name = $original_name;
        $file->directory_name = $directory_name;
        $file->save();

        $event->file = $file;
    }

    private function handleUpdated($event)
    {
    }
}
