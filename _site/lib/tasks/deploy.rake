namespace :deploy do

  require 'net/ssh'

  desc 'Deploy to staging'
  task :staging do

    host          = 'beta.attendease.com'
    username      = 'attendease'
    destination   = '/home/attendease/attendease/var/events/igala8'
    branch        = 'master'
    git_repo      = 'igala.github.com:coverall/igala.git'

    cmd_delimiter = " && "

    puts "Deploying the theme to staging (using the '#{branch}' branch)..."

    Net::SSH.start( host, username ) do |ssh|

      # from http://github.com/jbarnette/vlad-git/commit/749ab8f9bb7c24baafdd513a5b9d8246fc0a7f5a
      deploy_command = [
        "cd #{destination}",
        "git checkout #{branch}",
        "git pull",
      ].join( cmd_delimiter )

      puts ssh.exec!( deploy_command )
      ssh.loop
    end
  end

  desc 'Deploy to production'
  task :production do

    host          = 'attendease.com'
    username      = 'attendease'
    destination   = '/home/attendease/attendease/var/events/igala8'
    branch        = 'master'
    git_repo      = 'igala.github.com:coverall/igala.git'

    cmd_delimiter = " && "

    puts "Deploying theme to production (using the '#{branch}' branch)..."

    Net::SSH.start( host, username ) do |ssh|

      # from http://github.com/jbarnette/vlad-git/commit/749ab8f9bb7c24baafdd513a5b9d8246fc0a7f5a
      deploy_command = [
        "cd #{destination}",
        "git checkout #{branch}",
        "git pull",
      ].join( cmd_delimiter )

      puts ssh.exec!( deploy_command )
      ssh.loop
    end
  end
end

