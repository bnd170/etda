<?php

namespace App\Orchid\Screens\News;

use App\Models\News;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class NewsListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'news' => News::filters()->defaultSort('created_at')->paginate(),
        ];
    }

    public function delete(News $news)
    {
        $news->delete();
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'News';
    }

    public function description(): ?string
    {
        return 'From here you can manage the news';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Create')
                ->icon('pencil')
                ->class('btn')
                ->route('platform.news.edit')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::table('news', [
                TD::make('title', 'Title')
                    ->sort()
                    ->filter(Input::make())
                    ->render(function (News $news) {
                        return Link::make($news->title)
                            ->route('platform.news.edit', $news);
                    }),
                TD::make('adminCreatedAt', 'Created at')->sort(),
                TD::make('adminUpdatedAt', 'Last updated')->sort(),
                TD::make('Actions')
                    ->alignRight()
                    ->render(function (News $news) {
                        return Button::make('Delete')
                            ->icon('trash')
                            ->class('btn btn-danger')
                            ->confirm('After deleting, the news will be gone forever.')
                            ->method('delete', ['news' => $news->id]);
                    }),
            ]),
        ];
    }
}
