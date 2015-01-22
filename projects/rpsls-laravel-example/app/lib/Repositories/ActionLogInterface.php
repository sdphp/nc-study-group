<?php

interface ActionLogInterface {

	/**
	 * Return all logged actions
	 */
	public function all();

	/**
	 * Return specific logged action
	 * @param $id integer
	 */
	public function find($id);

	/**
	 * Create a logged action
	 * @param $data array
	 */
	public function create(array $data);
}
