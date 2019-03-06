<aside class="main-sidebar">
    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
//                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Years', 'icon' => 'calendar', 'url' => ['/years']],
                    ['label' => 'Users', 'icon' => 'users', 'url' => ['/user']],
                    ['label' => 'Departments', 'icon' => 'university', 'url' => ['/departments']],

                    ['label' => 'Behavioral', 'icon' => 'handshake-o', 'url' => ['/behavioral']],
                    ['label' => 'Impacts', 'icon' => 'umbrella', 'url' => ['/impact']],
                    ['label' => 'Development', 'icon' => 'bar-chart', 'url' => ['/development']],
//                    ['label' => 'User behavioral', 'icon' => 'file-code-o', 'url' => ['/user-behavioral']],
//                    ['label' => 'Behavioral feedback', 'icon' => 'file-code-o', 'url' => ['/behavioral-feedback']],
                    ['label' => 'User goals', 'icon' => 'hand-rock-o', 'url' => ['/goals']],
                    ['label' => 'User behavioral', 'icon' => 'file-code-o', 'url' => ['/user-behavioral']],
//                    ['label' => 'Goals feedback', 'icon' => 'file-code-o', 'url' => ['/goals-feedback']],
                ],
            ]
        ) ?>

    </section>

</aside>
