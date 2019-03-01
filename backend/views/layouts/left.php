<aside class="main-sidebar">
    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
//                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Behavioral', 'icon' => 'list', 'url' => ['/behavioral']],
                    ['label' => 'Development', 'icon' => 'list', 'url' => ['/development']],
                    ['label' => 'Impacts', 'icon' => 'outdent', 'url' => ['/impact']],
//                    ['label' => 'User behavioral', 'icon' => 'file-code-o', 'url' => ['/user-behavioral']],
//                    ['label' => 'Behavioral feedback', 'icon' => 'file-code-o', 'url' => ['/behavioral-feedback']],
//                    ['label' => 'Goals', 'icon' => 'file-code-o', 'url' => ['/goals']],
//                    ['label' => 'Goals feedback', 'icon' => 'file-code-o', 'url' => ['/goals-feedback']],
                    ['label' => 'Departments', 'icon' => 'list', 'url' => ['/departments']],
                    ['label' => 'Users', 'icon' => 'users', 'url' => ['/user']],
                    ['label' => 'Years', 'icon' => 'list', 'url' => ['/years']],

                ],
            ]
        ) ?>

    </section>

</aside>
