<div class="col-12">
    <div class="card">
        <div class="card-header card-inverse" style="background-color: #6bbaa7; color: #fff;">
            <h5>Your Statistics</h5>
        </div>
        <div class="card-block">
            <div class="card-deck">
              <div class="card card-small">
                  <table class="size-5 full-table">
                      <tr class="text-center">
                          <td class="pt-3 pb-3 blue"><span class="lnr lnr-bullhorn"></span></td>
                          <td class="stat">{{ Auth::user()->num_events }}</td>
                      </tr>
                  </table>
                <div class="card-block m-0">
                  <h4 class="card-title text-center">Events Created</h4>
                </div>
              </div>
              <div class="card card-small">
                  <table class="size-5 full-table">
                      <tr class="text-center">
                          <td class="pt-3 pb-3 blue"><span class="lnr lnr-calendar-full"></span></td>
                          <td class="stat">
                              <?php
                                    if(Auth::user()->num_events > 0) {
                                        $date = DB::table('events')->orderBy('date', 'ASC')->first();
                                        if(strtotime($date->date) <= strtotime(date('m/d/Y'))) {
                                            $id = $date->id;
                                            DB::table('events')->where('id', $id)->delete();
                                            $user = Auth::user();
                                            $user->num_events = $user->num_events - 1;
                                            $user->save();
                                            $date = DB::table('events')->orderBy('date', 'ASC')->first();
                                        }

                                        $date = $date->date;
                                        // $date = str_replace('/', '-', $date);
                                        $date = date('Y-m-d', strtotime($date));
                                        $currDate = date('Y-m-d');
                                        $diff = abs(strtotime($date) - strtotime($currDate));
                                        $diff = $diff / 86400;
                                        echo $diff + 1;
                                    }
                                    else {
                                        echo 0;
                                    }
                               ?>
                          </td>
                      </tr>
                  </table>
                  <div class="card-block">
                    <h4 class="card-title text-center">Days Until Next Event</h4>
                  </div>
              </div>
              <div class="card card-small">
                  <table class="size-5 full-table">
                      <tr class="text-center">
                          <td class="pt-3 pb-3 blue"><span class="lnr lnr-users"></span></td>
                          <td class="stat">
                              <?php
                                echo Auth::user()->num_people_events;
                              ?>
                          </td>
                      </tr>
                  </table>
                  <div class="card-block">
                    <h4 class="card-title text-center">Number of People Attended</h4>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>

<style>
    .full-table {
        width: 100%;
    }

    .size-5 {
        font-size: 5em;
    }

    h4 {
        font-weight: 200;
    }

    h5 {
        font-weight: 200;
        margin: 0;
    }

    .blue {
        color: #6bbaa7 !important;
    }

    .stat {
        font-size: 0.8em;
    }

    .card-small {
        background: #3f3f3f !important;
    }
</style>
