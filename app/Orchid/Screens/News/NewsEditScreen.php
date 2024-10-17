<?php

namespace App\Orchid\Screens\News;

use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class NewsEditScreen extends Screen
{
    public ?News $news = null;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(News $news): iterable
    {
        return [
            'news' => $news,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->news->exists ? 'Edit news' : 'Create news';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Publish')
                ->icon('send')
                ->method('createOrUpdate')
                ->canSee(!$this->news->exists),

            Button::make()
                ->icon('trash')
                ->class('btn btn-danger float-right py-2')
                ->confirm('After deleting, the news will be gone forever.')
                ->method('remove')
                ->canSee($this->news->exists),

            Button::make('Update')
                ->icon('disk')
                ->class('btn btn-success float-right')
                ->method('createOrUpdate')
                ->canSee($this->news->exists),

        ];
    }


    public function layout(): array
    {
        return [
            Layout::rows(
                [
                    Input::make('news.title')
                        ->title('Title')
                        ->help('Specify a short descriptive title for this post.'),

                    Quill::make('news.content')
                        ->title('News content'),

                    Cropper::make('news.cover_id')
                        ->title('Large web banner image, generally in the front and center')
                        ->width(1600)
                        ->height(600)
                        ->maxFileSize(0.5)
                        ->targetId(),
                ]
            ),
        ];
    }


    public function createOrUpdate(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'news.title'    => 'required|max:255',
                'news.content'  => 'required',
                'news.cover_id' => 'required|exists:attachments,id',
            ]
        );

        $this->news->fill($request->get('news'))->save();

        Alert::info('You have successfully created a news.');

        return redirect()->route('platform.news.list');
    }

    public function remove(): RedirectResponse
    {
        $this->news->delete();

        Alert::info('You have successfully deleted the news.');

        return redirect()->route('platform.news.list');
    }
}
