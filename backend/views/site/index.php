<?php
use kartik\tabs\TabsX;
use yii\bootstrap4\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
$items = [
    [
        'label'=>'<i class="fa fa-address-book"></i> Клиенты',
        'content'=>"В этом блоке есть возможность перехода на страницу всех клиентов <a href='/client'>Клиенты</a>, 
                    также есть возможность перейти на определенного клиента <i style='width: 30px; height: 30px;' class='fa fa-eye'></i>Клиент</a>. 
                    Для добавления нового клиента перейти по ссылке <a href='/client/create'>Добавить нового клиента</a>. 
                    Для того, чтобы удалить клиента нужно перейти на страницу Клиенты, показана выше, и нажать на кнопку удалить 
                    <i style='width: 30px; height: 30px;' class='fa fa-trash'></i><img style='width: 1200px;height: 600px' src='/img/clients.jpg'>",
        'active'=>true
    ],
    [
        'label'=>'<i class="fa fa-plug"></i> Подключения',
        'content'=>"В этом блоке есть возможность перехода на страницу всех подключений <a href='/connection'>Подключения</a>, 
                    также есть возможность перейти на определенное подключение <i style='width: 30px; height: 30px;' class='fa fa-eye'></i></a>.
                    Для создания нового подключения перейти по ссылке <a href='/connection/create'>Создать новое подключение</a>. 
                    Для того, чтобы удалить подключение нужно перейти на страницу Подключения, показана выше, и нажать на кнопку удалить 
                    <i style='width: 30px; height: 30px;' class='fa fa-trash'></i><img style='width: 1200px;height: 600px' src='/img/connections.jpg'>",
    ],
    [
        'label'=>'<i class="fa fa-server"></i> Услуги',
        'content'=>"В этом блоке есть возможность перехода на страницу всех услуг <a href='/service'>Услуги</a>, 
                    также есть возможность перейти на определенную услугу <i style='width: 30px; height: 30px;' class='fa fa-eye'></i></a>.
                    Для добавления новой услуги перейти по ссылке <a href='/service/create'>Создать новую услугу</a>. 
                    Для того, чтобы удалить услугу нужно перейти на страницу Услуги, показана выше, и нажать на кнопку удалить 
                    <i style='width: 30px; height: 30px;' class='fa fa-trash'></i><img style='width: 1200px;height: 600px' src='/img/services.jpg'>",
    ],
    [
        'label'=>'<i class="fa fa-comments"></i> Заявки',
        'content'=>"В этом блоке есть возможность перехода на страницу всех заявок <a href='/request'>Заявки</a>, 
                    также есть возможность перейти на определенную заявку <i style='width: 30px; height: 30px;' class='fa fa-eye'></i></a>.
                    Для того, чтобы удалить заявку нужно перейти на страницу Заявки, показана выше, и нажать на кнопку удалить 
                    <i style='width: 30px; height: 30px;' class='fa fa-trash'></i><img style='width: 1200px;height: 600px' src='/img/requests.jpg'>",
    ],
    [
        'label' =>'<i class="fa fa-times"></i> Выход',
        'linkOptions'=>['data-url'=>'site/logout'],
    ],
];
echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_LEFT,
    'encodeLabels'=>false
]);
?>

