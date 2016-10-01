@servers(['staging' => ['acve']])

@task('deploy', ['on' => 'staging'])
    cd /var/www/starveyourgarbage.com
		ls
    git pull origin live_alpha

    php artisan migrate
@endtask

