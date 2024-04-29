<div class="content-wrapper p-2 vw-100 min-vh-100">
    {** Content Header (Page header) **}
    {include file="./main_content/main_header.tpl"}
    {** Main content **}
    <div id="holder" class="p-2">
        <div class="d-flex justify-items-center p-1">

            <div class="me-auto">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i></button>
                    <button type="button" class="btn btn-primary"><i class="fa-solid fa-arrow-right"></i></button>
                </div>
                <button type="button" class="btn btn-primary">Aujourd'hui</button>
            </div>

            <p class="mx-auto fw-bold">
                Avril 2024
            </p>


            <div class="btn-group ms-auto" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
                <label class="btn btn-outline-primary" for="btnradio1">Année</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" checked>
                <label class="btn btn-outline-primary" for="btnradio2">Mois</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                <label class="btn btn-outline-primary" for="btnradio3">Semaine</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
                <label class="btn btn-outline-primary" for="btnradio4">Jour</label>
            </div>
        </div>

        <div class="px-2 table-responsive mt-3">
            <table class="table table-hover local-calendar">
                <thead class="table-primary">
                <tr>
                    <th scope="col">Lundi</th>
                    <th scope="col">Mardi</th>
                    <th scope="col">Mercredi</th>
                    <th scope="col">Jeudi</th>
                    <th scope="col">Vendredi</th>
                    <th scope="col">Samedi</th>
                    <th scope="col">Dimanche</th>
                </tr>
                </thead>
                <tbody class="month">
                <tr>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">01</span>
                            <span class="local-event-column"></span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">02</span>
                            <span class="local-event-column"></span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">03</span>
                            <span class="local-event-column"></span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">04</span>
                            <span class="local-event-column"></span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">05</span>
                            <span class="local-event-column text-center rounded" style="background: #980dad4f">RDV</span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">06</span>
                            <span class="local-event-column text-center rounded" style="background: #980dad4f">RDV</span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">07</span>
                            <span class="local-event-column"></span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">08</span>
                            <span class="local-event-column text-center rounded"></span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">09</span>
                            <span class="local-event-column"></span>
                        </div>
                    </td>

                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">10</span>
                            <span class="local-event-column"></span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">11</span>
                            <span class="local-event-column"></span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">12</span>
                            <span class="local-event-column"></span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">13</span>
                            <span class="local-event-column"></span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">14</span>
                            <span class="local-event-column text-center rounded"></span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">15</span>
                            <span class="local-event-column text-center rounded"></span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">16</span>
                            <span class="local-event-column"></span>
                        </div>
                    </td>

                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">17</span>
                            <span class="local-event-column"></span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">18</span>
                            <span class="local-event-column"></span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">19</span>
                            <span class="local-event-column"></span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">20</span>
                            <span class="local-event-column"></span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">21</span>
                            <span class="local-event-column text-center rounded" style="background: #ad8d0d4f">Vacances</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">22</span>
                            <span class="local-event-column text-center rounded" style="background: #ad8d0d4f">Vacances</span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">23</span>
                            <span class="local-event-column text-center rounded" style="background: #ad8d0d4f">Vacances</span>
                        </div>
                    </td>

                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">24</span>
                            <span class="local-event-column text-center rounded" style="background: #ad8d0d4f">Vacances</span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">25</span>
                            <span class="local-event-column"></span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">26</span>
                            <span class="local-event-column"></span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">27</span>
                            <span class="local-event-column"></span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">28</span>
                            <span class="local-event-column text-center rounded" style="background: #0d6aad4f">Anniversaire</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">29</span>
                            <span class="local-event-column text-center rounded"></span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column">30</span>
                            <span class="local-event-column"></span>
                        </div>
                    </td>


                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column local-gray-text">01</span>
                            <span class="local-event-column"></span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column local-gray-text">02</span>
                            <span class="local-event-column"></span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column local-gray-text">03</span>
                            <span class="local-event-column"></span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column local-gray-text">04</span>
                            <span class="local-event-column"></span>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="d-flex flex-column gap-3">
                            <span class="local-day-column local-gray-text">05</span>
                            <span class="local-event-column"></span>
                        </div>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>