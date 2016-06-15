<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 6/15/16
 * Time: 1:14 AM
 */

namespace App\Pagination;

use Illuminate\Support\HtmlString;
use Illuminate\Pagination\UrlWindow;
use Illuminate\Contracts\Pagination\Paginator as PaginatorContract;
use Illuminate\Contracts\Pagination\Presenter as PresenterContract;
use Illuminate\Pagination\BootstrapFourNextPreviousButtonRendererTrait;
use Illuminate\Pagination\UrlWindowPresenterTrait;

class CustomPresenter implements PresenterContract
{
    use BootstrapFourNextPreviousButtonRendererTrait, UrlWindowPresenterTrait;

    public function __construct(PaginatorContract $paginator, UrlWindow $window = null)
    {
        $this->paginator = $paginator;
        $this->window = is_null($window) ? UrlWindow::make($paginator) : $window->get();
    }

    public function render()
    {
        if ($this->hasPages()) {
            return new HtmlString(sprintf('<div class="paginator">%s %s %s</div>', $this->getPreviousButton(), $this->getLinks(), $this->getNextButton()));
        }

        return '';
    }

    public function hasPages()
    {
        return $this->paginator->hasPages();
    }

    public function getDisabledTextWrapper($text)
    {
        return '<span class="paginator__link paginator__link--disabled">' . $text . '</span>';
    }

    public function getActivePageWrapper($text)
    {
        return '<span class="paginator__link paginator__link--active">' . $text . '</span>';
    }

    public function getAvailablePageWrapper($url, $page, $rel = null)
    {
        $rel = is_null($rel) ? '' : ' rel="' . $rel . '"';

        return '<a class="paginator__link paginator__link" href="' . htmlentities($url) . '"' . $rel . '>' . $page . '</a>';
    }
}
