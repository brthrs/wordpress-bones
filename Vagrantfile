# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|

  # Brthrs Vagrant Box

  # Box
  config.vm.box = "brthrs_vagrant_wp_box"
  config.vm.box_url = "https://s3-eu-west-1.amazonaws.com/brthrs-vagrant-box/brthrs_vagrant_wp_box.box"

  # Private Network with Hostsupdater (https://github.com/cogitatio/vagrant-hostsupdater)
  # config.vm.network :private_network, ip: "10.0.1.44"
  # config.vm.hostname = "wordpress.dev"
  # config.hostsupdater.aliases = [wordpress.dev"]

  # Public Network
  config.vm.network "public_network"

  # Synced Folders
  config.vm.synced_folder "./", "/var/www/wp-content/themes/theme", :owner => "www-data", :mount_options => [ "dmode=775", "fmode=774" ]

end