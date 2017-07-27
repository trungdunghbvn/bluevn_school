<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
<!--        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>-->

        <!-- search form -->
<!--        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->
        <?php
        $user = \app\models\User::findOne(Yii::$app->user->id);
        $role = $user->role;
        ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
//                    ['label' => '', 'options' => ['class' => 'header']],
                    ['label' => 'Quản lý nhân sự', 'icon' => 'file-code-o', 'url' => ['#'],
                        'items' => [
                                   ['label' => 'Tổ chuyên môn', 'icon' => 'circle-o', 'url' => '#',],
                                   [
                                       'label' => 'Danh sách nhân sự',
                                       'icon' => 'circle-o',
                                       'url' => '#',
                                   ],
                               ],
                    ],
                    ['label' => 'Quản lý học sinh', 'icon' => 'dashboard', 'url' => ['/#'],
                        'items' => [
                                ['label' => 'Danh sách lơp', 'icon' => 'circle-o', 'url' => '#',],
                                ['label' => 'Danh sách học sinh','icon' => 'circle-o', 'url' => '#',],
                                ['label' => 'Thời khóa biểu', 'icon' => 'circle-o', 'url' => '#',],
                                ['label' => 'Điểm danh', 'icon' => 'circle-o', 'url' => '#',],
                                ['label' => 'Đánh giá nhận xét', 'icon' => 'circle-o', 'url' => '#',],
                           ],
                    ],
                    ['label' => 'Quản lý điểm và môn học', 'icon' => 'dashboard', 'url' => ['/#'],
                        'items' => [
                                ['label' => 'Danh sách môn học', 'icon' => 'circle-o', 'url' => '#',],
                                ['label' => 'Điểm môn học','icon' => 'circle-o', 'url' => '#',],
                                ['label' => 'Điểm theo kỳ thi', 'icon' => 'circle-o', 'url' => '#',],
                           ],
                    ],
                    ['label' => 'Quản lý tin nhắn', 'icon' => 'dashboard', 'url' => ['/#'],
                        'items' => [
                                ['label' => 'Gửi tin theo nhóm', 'icon' => 'circle-o', 'url' => '#',],
                                ['label' => 'Lịch sử tin nhắn','icon' => 'circle-o', 'url' => '#',],
                           ],
                    ],
                    ['label' => 'Quản lý tài khoản', 'icon' => 'dashboard', 'url' => ['/user']],
                    ['label' => 'Quản lý khách hàng', 'icon' => 'dashboard', 'url' => ['/user/customer'],'visible' => (!($role == 3) ),
                        
                    ],
                    ['label' => 'Quản lý trường', 'icon' => 'dashboard', 'url' => ['/#'],
                        'items' => [
                                ['label' => 'Danh sách trường', 'icon' => 'circle-o', 'url' => ['/shools'],],
                                ['label' => 'Danh sách admin trường','icon' => 'circle-o', 'url' =>['/user-school'],],
                           ],
                    ],
                    
                    ['label' => 'Cài đặt', 'icon' => 'dashboard', 'url' => ['/listsetup']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    
                ],
            ]
        ) ?>

    </section>

</aside>
