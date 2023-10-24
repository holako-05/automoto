<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role' => 1,
            'type' => 1,
            'client' => null,
            'employe' => 2,
            'login' => 'admin',
            'password' => Hash::make('12345678'), // Consider Hash::make('password') for hashing password
            'name' => 'Admin',
            'first_name' => 'Admin',
            'email' => '',
            'email_verified_at' => null,
            'remember_token' => null,
            'confirmation_token' => null,
            'photo' => 'profil.jpg',
            'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2022-02-01 11:56:49'),
            'created_by' => null,
            'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-01-21 19:21:19'),
            'updated_by' => null,
            'deleted' => 0,
            'deleted_at' => null,
            'deleted_by' => null,
            'activated_at' => null,
            'activated_by' => null,
            'validated' => 1,
            'validated_at' => null,
            'validated_by' => null
        ]);

        DB::table('apparences')->insert([
            'label' => 'QUICKY',
            'title' => 'QUICKY',
            'logo_titre' => 'QUICKY',
            'layout' => 'verticalmoderne',
            'logo' => '',
            'logo_home' => '',
            'couleur_header' => '#ffffff',
            'couleur_sidebar' => '#2c323f',
            'couleur_sidebar_logo' => '#2c323f',
            'statut' => '1',
        ]);

        DB::table('menus')->insert([
            [
                'id' => 1,
                'titre' => 'Tableaux de bord',
                'page' => 'admin',
                'parent_menu' => null,
                'ordre' => '1',
                'ressource' => null,
                'statut' => '1',
                'icon' => 'home-circle',
                'roles' => null,
                'desc' => null,
                'deleted' => 0,
                'deleted_at' => null,
                'deleted_by' => null,
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2022-09-06 21:21:10'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2022-09-06 21:37:04'),
            ],
            [
                'id' => 2,
                'titre' => 'Sécurité',
                'page' => null,
                'parent_menu' => null,
                'ordre' => '5',
                'ressource' => null,
                'statut' => '1',
                'icon' => 'check-shield',
                'roles' => null,
                'desc' => null,
                'deleted' => 0,
                'deleted_at' => null,
                'deleted_by' => null,
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2022-09-06 21:22:07'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2022-09-10 20:37:10'),
            ],
            [
                'id' => 3,
                'titre' => 'Utilisateurs',
                'page' => 'user.index',
                'parent_menu' => '2',
                'ordre' => '2',
                'ressource' => null,
                'statut' => '1',
                'icon' => 'group',
                'roles' => null,
                'desc' => null,
                'deleted' => 0,
                'deleted_at' => null,
                'deleted_by' => null,
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2022-09-06 21:27:56'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2022-09-06 21:55:24'),
            ],
            [
                'id' => 4,
                'titre' => 'Rôles',
                'page' => 'role_list',
                'parent_menu' => '2',
                'ordre' => '2',
                'ressource' => null,
                'statut' => '1',
                'icon' => 'user-check',
                'roles' => null,
                'desc' => null,
                'deleted' => 0,
                'deleted_at' => null,
                'deleted_by' => null,
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2022-09-06 21:28:51'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2022-09-06 21:28:51'),
            ],
            [
                'id' => 5,
                'titre' => 'Permissions',
                'page' => 'permission.index',
                'parent_menu' => '2',
                'ordre' => '3',
                'ressource' => null,
                'statut' => '1',
                'icon' => 'list-check',
                'roles' => null,
                'desc' => null,
                'deleted' => 0,
                'deleted_at' => null,
                'deleted_by' => null,
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2022-09-06 21:28:51'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2022-09-06 21:28:51'),
            ],
            [
                'id' => 6,
                'titre' => 'Paramétrage',
                'page' => null,
                'parent_menu' => null,
                'ordre' => '6',
                'ressource' => null,
                'statut' => '1',
                'icon' => 'cog',
                'roles' => null,
                'desc' => null,
                'deleted' => 0,
                'deleted_at' => null,
                'deleted_by' => null,
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2022-09-06 21:55:02'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-01-21 20:28:31'),
            ],
            [
                'id' => 7,
                'titre' => 'Gestion du menu',
                'page' => 'menu_list',
                'parent_menu' => '6',
                'ordre' => '1',
                'ressource' => null,
                'statut' => '1',
                'icon' => 'food-menu',
                'roles' => null,
                'desc' => null,
                'deleted' => 0,
                'deleted_at' => null,
                'deleted_by' => null,
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-01-21 20:28:12'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-01-21 20:28:12'),
            ], [
                'id' => 8,
                'titre' => 'Apparence',
                'page' => 'apparence_list',
                'parent_menu' => '6',
                'ordre' => '2',
                'ressource' => null,
                'statut' => '1',
                'icon' => 'paint-roll',
                'roles' => null,
                'desc' => null,
                'deleted' => 0,
                'deleted_at' => null,
                'deleted_by' => null,
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-01-21 20:28:12'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-01-21 20:28:12'),
            ], [
                'id' => 9,
                'titre' => 'Fonctionnalités',
                'page' => 'fonctionnalite_list',
                'parent_menu' => '6',
                'ordre' => '3',
                'ressource' => null,
                'statut' => '1',
                'icon' => 'list-ul',
                'roles' => null,
                'desc' => null,
                'deleted' => 0,
                'deleted_at' => null,
                'deleted_by' => null,
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-01-21 20:28:12'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-01-21 20:28:12'),
            ], [
                'id' => 10,
                'titre' => 'Société',
                'page' => 'company.index',
                'parent_menu' => '6',
                'ordre' => '4',
                'ressource' => null,
                'statut' => '1',
                'icon' => 'buildings',
                'roles' => null,
                'desc' => null,
                'deleted' => 0,
                'deleted_at' => null,
                'deleted_by' => null,
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-01-21 20:28:12'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-01-21 20:28:12'),
            ],
            [
                'id' => 11,
                'titre' => 'Ressources',
                'page' => 'ressource_list',
                'parent_menu' => '6',
                'ordre' => '5',
                'ressource' => null,
                'statut' => '1',
                'icon' => 'data',
                'roles' => null,
                'desc' => null,
                'deleted' => 0,
                'deleted_at' => null,
                'deleted_by' => null,
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-01-21 20:28:12'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-01-21 20:28:12'),
            ],
        ]);

        DB::table('quickyprojects')->insert([
            [
                'name' => 'User',
                'id_project' => 'User',
                'deleted' => 0,
                'deleted_at' => null,
                'deleted_by' => null,
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-07-23 00:56:38'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-07-23 00:56:38'),
            ],
            [
                'name' => 'Role',
                'id_project' => 'Role',
                'deleted' => 0,
                'deleted_at' => null,
                'deleted_by' => null,
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-07-23 00:56:52'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-07-23 00:56:52'),
            ],
            [
                'name' => 'Menu',
                'id_project' => 'Menu',
                'deleted' => 0,
                'deleted_at' => null,
                'deleted_by' => null,
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-07-23 00:57:12'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-07-23 00:57:12'),
            ],
            [
                'name' => 'Apparence',
                'id_project' => 'Apparence',
                'deleted' => 0,
                'deleted_at' => null,
                'deleted_by' => null,
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-07-23 00:59:35'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-07-23 00:59:35'),
            ],
            [
                'name' => 'Ressource',
                'id_project' => 'Ressource',
                'deleted' => 0,
                'deleted_at' => null,
                'deleted_by' => null,
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-07-23 00:59:58'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-07-23 00:59:58'),
            ],
            [
                'name' => 'Fonctionnalite',
                'id_project' => 'Fonctionnalite',
                'deleted' => 0,
                'deleted_at' => null,
                'deleted_by' => null,
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-07-23 01:00:15'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-07-23 01:00:15'),
            ],
            [
                'name' => 'Quickyproject',
                'id_project' => 'Quickyproject',
                'deleted' => 0,
                'deleted_at' => null,
                'deleted_by' => null,
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-07-23 01:00:33'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-07-23 01:00:33'),
            ], [
                'name' => 'Permission',
                'id_project' => 'Permission',
                'deleted' => 0,
                'deleted_at' => null,
                'deleted_by' => null,
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-07-23 01:00:33'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-07-23 01:00:33'),
            ], [
                'name' => 'Rolepermission',
                'id_project' => 'Rolepermission',
                'deleted' => 0,
                'deleted_at' => null,
                'deleted_by' => null,
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-07-23 01:00:33'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-07-23 01:00:33'),
            ], [
                'name' => 'Company',
                'id_project' => 'Company',
                'deleted' => 0,
                'deleted_at' => null,
                'deleted_by' => null,
                'created_by' => null,
                'updated_by' => null,
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-07-23 01:00:33'),
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-07-23 01:00:33'),
            ],
        ]);

        DB::table('roles')->insert([
            [
                'role' => 'Administrateur',
                'label' => 'Administrateur',
                'desc' => null,
                'color' => "primary",
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2022-02-26 07:51:58'),
                'created_by' => null,
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s', '2022-02-26 07:51:58'),
                'updated_by' => null,
                'deleted' => 0,
                'deleted_at' => null,
                'deleted_by' => null,
            ],
        ]);
    }
}