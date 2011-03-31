set :application, "ci_template"
set :repository, "git@github.com:cleblanc87/ci_template.git"

role :web, "localhost"

set :deploy_to, "/home/ubuntu/public_html"
set :scm, "git"

namespace :deploy do
  task :default do
    transaction do
      update
      run "cp -r /home/ubuntu/public_html/current/* /home/ubuntu/public_html/"
      run "php /home/ubuntu/public_html/run_watchers.php"
    end
  end
end
