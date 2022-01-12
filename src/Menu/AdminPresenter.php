<?php

namespace Dealskoo\Admin\Menu;

use Illuminate\Support\Str;
use Nwidart\Menus\MenuItem;
use Nwidart\Menus\Presenters\Presenter;

class AdminPresenter extends Presenter
{
    /**
     * Get open tag wrapper.
     *
     * @return string
     */
    public function getOpenTagWrapper()
    {
        return '<ul class="side-nav">';
    }

    /**
     * Get close tag wrapper.
     *
     * @return string
     */
    public function getCloseTagWrapper()
    {
        return '</ul>';
    }

    /**
     * Get menu tag without dropdown wrapper.
     *
     * @param \Nwidart\Menus\MenuItem $item
     *
     * @return string
     */
    public function getMenuWithoutDropdownWrapper($item)
    {
        return '<li' . $this->getActiveState($item) . '>
			<a class="side-nav-link" href="' . $item->getUrl() . '" ' . $item->getAttributes() . '>'
            . $item->getIcon() . '<span>' . __($item->title) . '</span></a></li>' . PHP_EOL;
    }
    /**
     * {@inheritdoc }.
     */
    public function getActiveState($item, $state = ' class="active side-nav-item"')
    {
        return $item->isActive() ? $state : ' class="side-nav-item"';
    }

    /**
     * Get active state on child items.
     *
     * @param $item
     * @param string $state
     *
     * @return null|string
     */
    public function getActiveStateOnChild($item, $state = 'active')
    {
        return $item->hasActiveOnChild() ? $state : null;
    }

    /**
     * {@inheritdoc }.
     */
    public function getDividerWrapper()
    {
        return '<li class="divider"></li>';
    }

    /**
     * {@inheritdoc }.
     */
    public function getHeaderWrapper($item)
    {
        return '<li class="side-nav-title side-nav-item">' . __($item->title) . '</li>';
    }

    /**
     * {@inheritdoc }.
     */
    public function getMenuWithDropDownWrapper($item)
    {
        $id = Str::random();

        return '
		<li class="side-nav-item ' . $this->getActiveStateOnChild($item) . '">
			<a class="side-nav-link" data-bs-toggle="collapse" href="#' . $id . '">
				' . $item->getIcon() . '<span>' . __($item->title) . '</span> <span class="menu-arrow"></span>
			</a>
			<div id="' . $id . '" class="collapse ' . $this->getActiveStateOnChild($item, 'in') . '">
					<ul class="side-nav-second-level">
						' . $this->getChildMenuItems($item) . '
					</ul>
			</div>
		</li>
		' . PHP_EOL;
    }

    public function getMultiLevelDropdownWrapper($item)
    {
        return $this->getMenuWithDropDownWrapper($item);
    }

    public function getChildMenuItems(MenuItem $item)
    {
        $results = '';
        foreach ($item->getChilds() as $child) {
            if ($child->hidden()) {
                continue;
            }

            if ($child->hasSubMenu()) {
                $results .= $this->getMultiLevelDropdownWrapper($child);
            } elseif ($child->isHeader()) {
                $results .= $this->getHeaderWrapper($child);
            } elseif ($child->isDivider()) {
                $results .= $this->getDividerWrapper();
            } else {
                $results .= $this->getMenuWithoutDropdownWrapper($child);
            }
        }

        return $results;
    }
}
