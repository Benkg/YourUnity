<div class="card mt-4 mb-4">
    <div class="card-block row">

        <div class = "col-6" data-toggle="anchors">
            <a href="/attachments/manager" class="btn buttons">Manage Attachments</a>
        </div>

        <!-- CSV Form -->
        <form class = "col-6 text-right" method="POST" action="/download/all">
          {{ csrf_field() }}
          <button class="btn btn-primary text-size-large">Download all data (CSV)</button>
        <form>

    </div>
</div>


<style>
.buttons {
    background-color: transparent !important;
    color: #6bbaa7 !important;
    border: 2px solid #6bbaa7 !important; /* Green */
}
</style>
