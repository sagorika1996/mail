<?php

/**
 * @copyright 2017 Christoph Wurst <christoph@winzerhof-wurst.at>
 *
 * @author 2017 Christoph Wurst <christoph@winzerhof-wurst.at>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\Mail\Service;

use OCA\Mail\Contracts\IUserPreferences;
use OCP\IConfig;

class UserPreferenceSevice implements IUserPreferences {

	/** @var IConfig */
	private $config;

	/** @var string */
	private $UserId;

	/**
	 * @param IConfig $config
	 * @param string $UserId
	 */
	public function __construct(IConfig $config, $UserId) {
		$this->UserId = $UserId;
		$this->config = $config;
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 */
	public function setPreference($key, $value) {
		$this->config->setUserValue($this->UserId, 'mail', $key, $value);
	}

	/**
	 * @param string $key
	 * @param mixed|null $default
	 */
	public function getPreference($key, $default = null) {
		return $this->config->getUserValue($this->UserId, 'mail', $key, $default);
	}

}
