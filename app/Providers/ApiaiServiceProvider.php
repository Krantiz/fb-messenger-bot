<?php

namespace IndianSuperLeague\Providers;
use DB;
use Illuminate\Support\ServiceProvider;

class ApiaiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        DB::listen(function ($query) {
            // $query->sql
            // $query->bindings
            // $query->time

            $table_list = ['players'];

            if(starts_with($query->sql, 'update')){

                preg_match('/`.*?`/', $query->sql, $matches);

                $table_name = str_replace('`', '', $matches[0]);

                if(in_array($table_name, $table_list) && 
                    DB::table($table_name)
                        ->where(['in_sync' => 1, 'id' => $query->bindings[1]])->exists()){
                    DB::table($table_name)
                    ->where('id', $query->bindings[1])
                    ->update(['in_sync' => 0]);     
                }
            }
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
