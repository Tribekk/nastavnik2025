<div class="screen quizzes-screen">
    <div class="content">
        <table style="table-layout: fixed" class="quizzes-table">
            <tr style="vertical-align: top">
                <!-- базовый -->
                <td style="">
                    <h3 class="pill pill__blue font-hero font-size-h5" style="margin: 20px 12px;">Анкета</h3>
                    <div style="padding: 0 20px; margin-top: 20px" class="compositions">
                        <div style="margin: 5px 0 15px 0">
                            <h4 class="font-size-h5 font-hero font-weight-bold text-blue p-0 m-0">О ТЕБЕ</h4>
                            <p class="font-hero p-0 m-0">Текущие общие сведения</p>
                        </div>
                        <div style="margin: 5px 0 15px 0">
                            <h4 class="font-size-h5 font-hero font-weight-bold text-blue p-0 m-0">ГОТОВНОСТЬ К ВЫБОРУ</h4>
                            <p class="font-hero p-0 m-0">Карьерные предпочтения и образ будущего</p>
                        </div>
                        <div style="margin: 5px 0 15px 0">
                            <h4 class="font-size-h5 font-hero font-weight-bold text-blue p-0 m-0">МОТИВЫ ВЫБОРА</h4>
                            <p class="font-hero p-0 m-0">Ключевые ориентиры любой деятельности</p>
                        </div>
                    </div>
                </td>

                <!-- Тест «Образ Я» -->
                <td style="vertical-align: top">
                    <h3 class="pill pill__orange font-hero font-size-h5" style="margin: 20px 12px;">«Профессиональные характеристики</h3>
                    <div style="padding: 0 20px; margin-top: 20px" class="text-center compositions">
                        <div style="margin: 5px 0 15px 0">
                            <h4 class="font-size-h5 font-hero font-weight-bold text-orange p-0 m-0">ОСОБЕННОСТИ ХАРАКТЕРА</h4>
                            <p class="font-hero p-0 m-0">Структурированный портрет личности</p>
                        </div>
                        <div style="margin: 5px 0 15px 0">
                            <h4 class="font-size-h5 font-hero font-weight-bold text-orange p-0 m-0">ИНТЕРЕСЫ</h4>
                            <p class="font-hero p-0 m-0">Направления будущей деятельности</p>
                        </div>
                        <div style="margin: 5px 0 15px 0">
                            <h4 class="font-size-h5 font-hero font-weight-bold text-orange p-0 m-0">ПОДХОДЯЩИЕ ПРОФЕССИИ</h4>
                            <p class="font-hero p-0 m-0">Варианты выбора</p>
                        </div>
                    </div>
                </td>

                @if($depthTestsFinished)
                    <!-- Углубленный тест -->
                    <td style="vertical-align: top">
                        <h3 class="pill pill__alla font-hero font-size-h4" style="margin: 20px 12px;">Углубленный тест</h3>
                        <div style="padding: 0 20px; margin-top: 20px" class="compositions">
                            <div style="margin: 5px 0 15px 0">
                                <h4 class="font-size-h5 font-hero font-weight-bold text-alla p-0 m-0">СКЛОННОСТИ</h4>
                                <p class="font-hero p-0 m-0">Профессиональные предпочтения</p>
                            </div>
                            <div style="margin: 5px 0 15px 0">
                                <h4 class="font-size-h5 font-hero font-weight-bold text-alla p-0 m-0">ОБЩИЙ УРОВЕНЬ ИНТЕЛЛЕКТА</h4>
                                <p class="font-hero p-0 m-0">Способности, восприятие информации, уровень абстрактно-логического мышления</p>
                            </div>
                            <div style="margin: 5px 0 15px 0">
                                <h4 class="font-size-h5 font-hero font-weight-bold text-alla p-0 m-0">ТИП МЫШЛЕНИЯ</h4>
                                <p class="font-hero p-0 m-0">Эффективный способ преобразования информации, коммуникаций и решения задач</p>
                            </div>
                            <div style="margin: 5px 0 15px 0">
                                <h4 class="font-size-h5 font-hero font-weight-bold text-alla p-0 m-0">РЕШЕНИЕ КЕЙСОВ</h4>
                                <p class="font-hero p-0 m-0">Аспекты мотивации, самооценка, отношение к делу, взаимодействие в команде</p>
                            </div>
                        </div>
                    </td>
                @endif
            </tr>
        </table>
    </div>
</div>

<style>
    .quizzes-table td:last-child .compositions {
        text-align: right!important;
    }
</style>
