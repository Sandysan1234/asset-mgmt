<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    $this->call('CostcenterSeeder');
    $this->call('LifetimeSeeder');
    $this->call('PemasokSeeder');
    $this->call('PlantSeeder');

    $this->call('LocationSeeder');
    $this->call('AssetClassSeeder');
    $this->call('AssetSeeder');
    $this->call('AuthGroups');
    $this->call('CreateUsers');
  }
}
