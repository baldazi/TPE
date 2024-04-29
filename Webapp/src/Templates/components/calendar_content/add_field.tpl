<form method="post" action="/calendar/create">
    <input type="hidden" name="stage" value="2"/>
    <div class="mb-3">
        <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-link"></i></span>
            <input type="text" placeholder="entrez votre lien pour ajouter un calendrier" class="form-control" id="ics-url" name="file_URL">
            <button type="submit" class="btn btn-primary btn-sm">
                Ajouter
            </button>
        </div>
    </div>
</form>