<?php

interface ActionLogInterface {
    public function all();
    public function find($id);
    public function create($data);
}