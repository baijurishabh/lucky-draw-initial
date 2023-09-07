<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            //dashboard
            'dashboard-module',
            'dashboard-total-orders',
            'dashboard-total-products',
            'dashboard-total-users',
            'dashboard-total-admins',
            'dashboard-total-pools',
            'dashboard-total-payments',
            //product
            'product-module',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            //category
            'category-module',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            //marketing
            'marketing-module',
            //pool
            'pool-module',
            'pool-list',
            'pool-create',
            'pool-edit',
            'pool-delete',
            'pool-conduct',
            //pool product
            'pool-product-list',
            'pool-product-create',
            'pool-product-edit',
            'pool-product-delete',
            //enquiry-list
            'enquiry-list',
            'enquiry-delete',
            //winner
            'winner-list',
            'winner-delete',
            //order
            'order-module',
            'order-list',
            'order-edit',
            'order-delete',
            //user
            'user-module',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            //payment
            'payment-module',
            'payment-list',
            'payment-edit',
            'payment-delete',
            //refund
            'refund-module',
            'refund-list',
            'refund-edit',
            'refund-delete',
            //blog
            'blog-module',
            'blog-list',
            'blog-create',
            'blog-edit',
            'blog-delete',
            //testimonial
            'testimonial-module',
            'testimonial-list',
            'testimonial-create',
            'testimonial-edit',
            'testimonial-delete',
            //policy
            'policy-module',
            'policy-edit',
            //faq
            'faq-module',
            'faq-list',
            'faq-create',
            'faq-edit',
            'faq-delete',
            //leads
            'leads-module',
            'leads-list',
            'leads-create',
            'leads-edit',
            'leads-delete',
            //admins
            'admin-module',
            'admin-list',
            'admin-create',
            'admin-edit',
            'admin-delete',
            //roles
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            //site-settings
            'site-settings-module',
            'site-settings-edit',
            'site-settings-list',
            //profile
            'profile-edit',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['guard_name' => 'admin', 'name' => $permission]);
        }
    }
}
