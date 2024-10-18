<?php

namespace Nahad\Foundation\Dashboard\Support;

class Value {
    public static function traverse($model, $key, $default = null, $traverse = null, $hasItems = false) {
        if (is_array($model)) {
            return \Arr::get($model, $key, $default);
        }

        if (is_null($key)) {
            return $model;
        }

        if (isset($model[$key])) {
            return $model[$key];
        }

        $count = substr_count($key, '.');
        if($count > 0) {
            $rels = \Str::beforeLast($key, '.');
            $model->load($rels);
        }
        else {
            return $model->$traverse;
        }

        if($traverse) {
            $key = $traverse;
        }

        $model = collect([$model]);
        $model = $model->pluck($key)->first();

        return ($hasItems || (!is_array($model))) ? $model : implode(', ', $model);
    }
    
}