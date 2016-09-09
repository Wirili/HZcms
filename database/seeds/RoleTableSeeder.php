<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [[
            'name'=>'admin',
            'display_name'=>'管理员'
        ],[
            'name'=>'article',
            'display_name'=>'文章管理员'
        ]];
        $role_user=[[
            'user_id'=>1,
            'role_id'=>1
        ]];
        $permissions =[[
            'name'=>'good_show',
            'display_name'=>'商品管理'
        ],[
            'name'=>'good_new',
            'parent_id'=>'1',
            'display_name'=>'新增商品'
        ],[
            'name'=>'good_edit',
            'parent_id'=>'1',
            'display_name'=>'修改商品'
        ],[
            'name'=>'good_del',
            'parent_id'=>'1',
            'display_name'=>'删除商品'
        ],[
            'name'=>'category_show',
            'display_name'=>'商品分类管理'
        ],[
            'name'=>'category_new',
            'parent_id'=>'5',
            'display_name'=>'新增商品分类'
        ],[
            'name'=>'category_edit',
            'parent_id'=>'5',
            'display_name'=>'修改商品分类'
        ],[
            'name'=>'category_del',
            'parent_id'=>'5',
            'display_name'=>'删除商品分类'
        ],[
            'name'=>'brand_show',
            'display_name'=>'品牌管理'
        ],[
            'name'=>'brand_new',
            'parent_id'=>'9',
            'display_name'=>'新增品牌'
        ],[
            'name'=>'brand_edit',
            'parent_id'=>'9',
            'display_name'=>'修改品牌'
        ],[
            'name'=>'brand_del',
            'parent_id'=>'9',
            'display_name'=>'删除品牌'
        ],[
            'name'=>'article_show',
            'display_name'=>'文章管理'
        ],[
            'name'=>'article_new',
            'parent_id'=>'13',
            'display_name'=>'新增文章'
        ],[
            'name'=>'article_edit',
            'parent_id'=>'13',
            'display_name'=>'修改文章'
        ],[
            'name'=>'article_del',
            'parent_id'=>'13',
            'display_name'=>'删除文章'
        ],[
            'name'=>'article_cat_show',
            'display_name'=>'文章分类管理'
        ],[
            'name'=>'article_cat_new',
            'parent_id'=>'17',
            'display_name'=>'新增文章分类'
        ],[
            'name'=>'article_cat_edit',
            'parent_id'=>'17',
            'display_name'=>'修改文章分类'
        ],[
            'name'=>'article_cat_del',
            'parent_id'=>'17',
            'display_name'=>'删除文章分类'
        ],[
            'name'=>'role_show',
            'display_name'=>'角色管理'
        ],[
            'name'=>'role_new',
            'parent_id'=>'21',
            'display_name'=>'新增角色'
        ],[
            'name'=>'role_edit',
            'parent_id'=>'21',
            'display_name'=>'修改角色'
        ],[
            'name'=>'role_del',
            'parent_id'=>'21',
            'display_name'=>'删除角色'
        ],[
            'name'=>'suppliers_show',
            'display_name'=>'供货商管理'
        ],[
            'name'=>'suppliers_new',
            'parent_id'=>'25',
            'display_name'=>'新增供货商'
        ],[
            'name'=>'suppliers_edit',
            'parent_id'=>'25',
            'display_name'=>'修改供货商'
        ],[
            'name'=>'suppliers_del',
            'parent_id'=>'25',
            'display_name'=>'删除供货商'
        ],[
            'name'=>'admin_show',
            'display_name'=>'管理员管理'
        ],[
            'name'=>'admin_new',
            'parent_id'=>'29',
            'display_name'=>'新增管理员'
        ],[
            'name'=>'admin_edit',
            'parent_id'=>'29',
            'display_name'=>'修改管理员'
        ],[
            'name'=>'admin_del',
            'parent_id'=>'29',
            'display_name'=>'删除管理员'
        ],[
            'name'=>'farm_show',
            'display_name'=>'宠物设置'
        ],[
            'name'=>'farm_new',
            'parent_id'=>'33',
            'display_name'=>'新增宠物'
        ],[
            'name'=>'farm_edit',
            'parent_id'=>'33',
            'display_name'=>'修改宠物'
        ],[
            'name'=>'farm_del',
            'parent_id'=>'33',
            'display_name'=>'删除宠物'
        ],[
            'name'=>'user_show',
            'display_name'=>'会员管理'
        ],[
            'name'=>'user_new',
            'parent_id'=>'37',
            'display_name'=>'新增会员'
        ],[
            'name'=>'user_edit',
            'parent_id'=>'37',
            'display_name'=>'修改会员'
        ],[
            'name'=>'user_del',
            'parent_id'=>'37',
            'display_name'=>'删除会员'
        ]];

        for ($i=1;$i<=40;$i++) {
            $permission_role[]=[
                'permission_id'=>$i,
                'role_id'=>1
            ];
        }

        foreach ($roles as $role) {
            Role::create($role);
        }

        foreach ($role_user as $item) {
            DB::table('role_user')->insert($item);
        }

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
        foreach ($permission_role as $item) {
            DB::table('permission_role')->insert($item);
        }
    }
}
