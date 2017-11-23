@extends('layouts.main_scripts')

@section('header')
	@include('layouts.header')
@endsection 

@section('content')
 
    <div class="container-fluid tarifs">
        <div class="row content_wrapper">
            <div class="col-md-8 tarifs_block" id="tarifs">
              <ul class="tarifs_tabs">
                <li><a href="#tarifs-1" class="tarifs_help tarifs_active">Покупка с нашей помощью</a></li>
                <li><a href="#tarifs-2" class="tarifs_self">Самостоятельная покупка</a></li>
              </ul>
              <div id="tarifs-1" class="tarifs_table-price">
                <table class="table table-bordered table-responsive">
                    <tr>
                        <th class="active">Наши услуги</th>
                        <th class="active">Наша комиссия</th>
                    </tr>
                    <tr>
                        <td>Стоимость покупки до 50€ (макс. до 10кг. )</td>
                        <td> 15€</td>
                    </tr>
                    <tr>
                        <td class="active">Стоимость покупки от 50€ до 100€ (макс. 20 кг. )</td>
                        <td class="active"> 20€</td>
                    </tr>
                    <tr>
                        <td>Стоимоть покупки от 100€ до 500€ (макс. 20 кг. )</td>
                        <td> 25€</td>
                    </tr>
                    <tr>
                        <td class="active">Стоимость покупки от 500€ до 900€ (макс. 20 кг. )</td>
                        <td class="active"> 30€</td>
                    </tr>
                </table>
    
                <table class="table table-bordered table-responsive tarifs_table-service">
                    <tr>
                        <th class="active">Наш сервис</th>
                        <th class="active"></th>
                    </tr>
                    <tr>
                        <td>Упаковка (если повреждена или ненадёжная)</td>
                        <td> 0€</td>
                    </tr>
                    <tr>
                        <td class="active">Оформление и выкуп заказа</td>
                        <td class="active"> 0€</td>
                    </tr>
                    <tr>
                        <td>Решаем проблемы с продавцом или товаром</td>
                        <td> 0€</td>
                    </tr>
                    <tr>
                        <td class="active">Удаление фабричной упаковки (наприм. обувных коробок)</td>
                        <td class="active"> 0€</td>
                    </tr>
                    <tr>
                        <td>Консолидация товара</td>
                        <td> 0€</td>
                    </tr>
                    <tr>
                        <td class="active">Хранение товара на складе до 30 дней</td>
                        <td class="active"> 0€</td>
                    </tr>
                    <tr>
                        <td>Объединение заказов при совместных покупках</td>
                        <td> 0€</td>
                    </tr>
                    <tr>
                        <td class="active">Звонок в любой магазин Германии</td>
                        <td class="active"> 0€</td>
                    </tr>
                    <tr>
                        <td>Заполнение таможенной декларации и сопроводительных документов DHL</td>
                        <td> 0€</td>
                    </tr>
                </table>
              </div>
              <div id="tarifs-2" class="tarifs_table-price">
                 <table class="table table-bordered table-responsive">
                    <tr>
                        <th class="active">Наши услуги</th>
                        <th class="active">Наша комиссия</th>
                    </tr>
                    <tr>
                        <td>Стоимость покупки до 50€ (макс. до 10кг. )</td>
                        <td> 10€</td>
                    </tr>
                    <tr>
                        <td class="active">Стоимость покупки от 50€ до 100€ (макс. 20 кг. )</td>
                        <td class="active"> 15€</td>
                    </tr>
                    <tr>
                        <td>Стоимоть покупки от 100€ до 500€ (макс. 20 кг. )</td>
                        <td> 20€</td>
                    </tr>
                    <tr>
                        <td class="active">Стоимость покупки от 500€ до 900€ (макс. 20 кг. )</td>
                        <td class="active"> 25€</td>
                    </tr>
                </table>
    
                <table class="table table-bordered table-responsive tarifs_table-service">
                    <tr>
                        <th class="active">Наш сервис</th>
                        <th class="active"></th>
                    </tr>
                    <tr>
                        <td>Упаковка (если повреждена или ненадёжная)</td>
                        <td> 0€</td>
                    </tr>
                    <tr>
                        <td class="active">Оформление и выкуп заказа</td>
                        <td class="active"> 0€</td>
                    </tr>
                    <tr>
                        <td>Решаем проблемы с продавцом или товаром</td>
                        <td> 0€</td>
                    </tr>
                    <tr>
                        <td class="active">Удаление фабричной упаковки (наприм. обувных коробок)</td>
                        <td class="active"> 0€</td>
                    </tr>
                    <tr>
                        <td>Консолидация товара</td>
                        <td> 0€</td>
                    </tr>
                    <tr>
                        <td class="active">Хранение товара на складе до 30 дней</td>
                        <td class="active"> 0€</td>
                    </tr>
                    <tr>
                        <td>Объединение заказов при совместных покупках</td>
                        <td> 0€</td>
                    </tr>
                    <tr>
                        <td class="active">Звонок в любой магазин Германии</td>
                        <td class="active"> 0€</td>
                    </tr>
                    <tr>
                        <td>Заполнение таможенной декларации и сопроводительных документов DHL</td>
                        <td> 0€</td>
                    </tr>
                </table>
            </div>
            <div id="tabs_shipment" class="tarifs_shipment">
                <h3>Доставка с DHL</h3>
                <ul>
                    <li><a href="#tabs_shipment-1" class="tarifs_shipment__active">Казахстан</a></li>
                    <li><a href="#tabs_shipment-2">Россия</a></li>
                </ul>
                <div id="tabs_shipment-1" class="tarifs_shipment-table">
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th class="info">ВЕС И РАЗМЕРЫ ПАКЕТОВ</th>
                            <th class="info">ЦЕНА</th>
                            <th class="info">ЛИМИТ В МЕСЯЦ</th>
                        </tr>
                        <tr>
                            <td>Пакет до 2 кг (макс. Д+Ш+В=90см, Каждая сторона не больше 60cm)</td>
                            <td> 19,09€</td>
                            <td> 1000€</td>
                        </tr>
                        <tr>
                            <td class="info">Пакет до 5 кг  (макс. 120 x 60 x 60cм)</td>
                            <td class="info"> 37,99€</td>
                            <td class="info"> 20 кг</td>
                        </tr>
                        <tr>
                            <td>Пакет до 10 кг  (макс. 120 x 60 x 60cм)</td>
                            <td> 51,99€</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="info">Пакет до 20 кг (макс. 120 x 60 x 60cм)</td>
                            <td class="info"> 71,99€</td>
                            <td class="info"></td>
                        </tr>
                    </table>
                </div>
                <div id="tabs_shipment-2" class="tarifs_shipment-table">
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th class="danger">ВЕС И РАЗМЕРЫ ПАКЕТОВ</th>
                            <th class="danger">ЦЕНА</th>
                            <th class="danger">ЛИМИТ В МЕСЯЦ</th>
                        </tr>
                        <tr>
                            <td>Пакет до 2 кг (макс. Д+Ш+В=90см, Каждая сторона не больше 60cm)</td>
                            <td> 19,09€</td>
                            <td> 1000€</td>
                        </tr>
                        <tr>
                            <td class="danger">Пакет до 5 кг  (макс. 120 x 60 x 60cм)</td>
                            <td class="danger"> 30,99€</td>
                            <td class="danger"> 20 кг</td>
                        </tr>
                        <tr>
                            <td>Пакет до 10 кг  (макс. 120 x 60 x 60cм)</td>
                            <td> 37,99€</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="danger">Пакет до 20 кг (макс. 120 x 60 x 60cм)</td>
                            <td class="danger"> 54,99€</td>
                            <td class="danger"></td>
                        </tr>
                    </table>
                </div>
            </div>   
            </div> <!-- col-md-8 -->
            <div class="col-md-1"></div>
            <div class="col-md-3 tarifs_sidebar">
                <div class="tarifs_siderbar-block tarifs_siderbar-news">
                    <a href="{{ route('allNews') }}">
                        <h4>Новости</h4>
                    </a>
                    @if(isset($news))
                        <div class="tarifs_sidebar-list">
                            @foreach($news as $news)
                                <div class="tarifs_sidebar-content">
                                    <div class="tarifs_sidebar-title">
                                        <h5>{{ $news->titel }}</h5><span>{{ date('d.m.y', strtotime($news->created_at)) }}</span>
                                    </div>
                                    <p>{{ $news->exerpt }}</p>
                                    <a href="{{ route('singleNews',['id' => $news->id ]) }}">>>> читать дальше</a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="tarifs_siderbar-block tarifs_siderbar-testimonials">
                    <a href="{{ route('allTestimonials') }}">
                        <h4>Отзывы наших клиентов</h4>
                    </a>
                    @if(isset($testimonial))
                        <div class="tarifs_sidebar-list">
                            @foreach($testimonial as $testimonial)
                                @if($testimonial->accepted == 1)
                                    <div class="tarifs_sidebar-content">
                                        <div class="tarifs_sidebar-title">
                                            <h5>{{ $testimonial->name }}</h5><span>{{ date('d.m.Y', strtotime($testimonial->created_at )) }}</span>
                                        </div>
                                        <p>{{ $testimonial->text }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid forbidden">
        <div class="row content_wrapper">
            <h3>Запрещенные товары</h3>
            <div class="col-md-12 forbidden_list">
                <div class="forbidden_item">
                    <h4>Валюта, монеты и ценные бумаги</h4>
                    <p>Любые платёжные средства, имеющие хождение в обороте.</p>
                </div>
                <div class="forbidden_item">
                    <h4>Драгоценные металлы и камни</h4>
                    <p>Ювелирные материалы в обработанном и естественном виде, за исключением фабричных ювелирных изделий.</p>
                </div>
                <div class="forbidden_item">
                    <h4>Биологические вещества и яды</h4>
                    <p>Бактериологические и вирусные вакцины, плазмы и другие производные крови, яды.</p>
                </div>
                <div class="forbidden_item">
                    <h4>Наркотические средства</h4>
                    <p>Психотропные и наркотические вещества, включая содержащиеся в лекарствах.</p>
                </div>
                <div class="forbidden_item">
                    <h4>Оружие и его части</h4>
                    <p>Холодное и огнестрельное оружие за исключением кухонных ножей и ножей в брелках и инструментах.</p>
                </div>
                <div class="forbidden_item">
                    <h4>Контрафактная продукция</h4>
                    <p>Нелегальные копии и реплики любых товаров, включая записи на носителях.</p>
                </div>
            </div>
        </div>
    </div>

	 
@endsection

@section('footer')
	@include('layouts.footer')
@endsection