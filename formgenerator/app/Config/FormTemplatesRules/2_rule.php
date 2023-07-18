<?php

$rules = [
    'name' => 'required|max_length[500]|min_length[3]|regex_match[/^[a-zA-Z0-9_ ]+$/]',
    'message' => 'required|max_length[500]|min_length[3]|regex_match[/^[a-zA-Z0-9_ ]+$/]',
    'gender' => 'required|max_length[500]|min_length[3]|regex_match[/^[a-zA-Z0-9_ ]+$/]',
];