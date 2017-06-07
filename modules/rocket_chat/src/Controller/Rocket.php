<?php

namespace Drupal\rocket_chat\Controller;

/**
 * Copyright (c) 2016.
 *
 * Authors:
 * - Houssam Jelliti <jelitihoussam@gmail.com>.
 * - Lawri van Buël <sysosmaster@2588960.no-reply.drupal.org>.
 *
 * This file is part of (rocket_chat) a Drupal 8 Module for Rocket.Chat
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

/**
 * @file
 * Contains \Drupal\rocket_chat\Controller\Rocket.
 *
 * The main controller of our module.
 */

use Drupal\Core\Controller\ControllerBase;
use Drupal\rocket_chat\WidgetHandler;

/**
 * Class Rocket extands ControllerBase.
 *
 * @package Drupal\rocket_chat\Controller
 */
class Rocket extends ControllerBase {

  /**
   * Create widget.
   *
   * @return array
   *    Rendered widget.
   */
  public function createWidget() {
    $widget = new WidgetHandler('rocket_chat', 'rocket_chat_conf');
    return $widget->renderWidgetWithJavaScriptKeys(['server']);
  }

}
