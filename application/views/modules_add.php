<div class="col-sm-9 col-md-9">
    <br/>
    <?php if(validation_errors() != null):?>
        <div class="alert alert-danger" role="alert"><?php echo validation_errors(); ?></div>
    <?php endif;?>
    <script>
        $(function() {
            var scntDiv = $('#autotab');
            var i = $('#autotab tr').size() + 1;

            $('body').on('click', '#addRow', function() {
                $('<tr>' +
                    '<td>' +
                        '<input type="text" name="partie['+ (i-2) +']" value="" placeholder="Identifiant de la partie" form="creer">' +
                    '</td>' +
                    '<td>' +
                        '<select name="type['+ (i-2) +']" form="creer" >' +
                            '<option value="CM">CM</option>' +
                            '<option value="TD">TD</option>' +
                            '<option value="TP">TP</option>' +
                            '<option value="Projet">Projet</option>' +
                        '</select>' +
                    '</td>' +
                    '<td>' +
                        '<input type="text" name="hed['+ (i-2) +']" value="" placeholder="HED" form="creer" >' +
                    '</td>' +
                '</tr>').appendTo(scntDiv);
                $('#widthRow').attr('value',i-2);
                i++;
                return false;
            });

            $('body').on('click', '#delRow', function() {
                if( i > 2 ) {
                    $("tr:last").remove();
                    i--;
                    $('#widthRow').attr('value',i-2);
                }
                return false;
            });
        });
    </script>
    <?php echo form_open("Modules/Creation", array('id' => 'creer'))?>
        <div class="form-group">
            <a href="#" id="addRow" class="btn btn-default">Ajouter Ligne</a>
            <a href="#" id="delRow" class="btn btn-default">Supprimer Ligne</a>
            <button type="submit" class="btn btn-default" value="ok" form="creer">Envoyer</button>
        </div>
        <div class="form-group">
            <label for="identifiant">
                Identifiant
            </label>
            <input type="text" id="identifiant" name="identifiant" class="form-control" placeholder="Identifiant du Module">
        </div>
        <div class="form-group">
            <label for="public">
                Public
            </label>
            <input type="text" id="public" name="public" class="form-control" placeholder="Public du Module">
        </div>
        <div class="form-group">
            <label for="semestre">
                Semestre
            </label>
            <select id="semestre" name="semestre" class="selectpicker form-control">
                <option value="S1">Semestre 1</option>
                <option value="S2">Semestre 2</option>
                <option value="S3">Semestre 3</option>
                <option value="S4">Semestre 4</option>
                <option value="S5">Semestre 5</option>
                <option value="S6">Semestre 6</option>
            </select>
        </div>
        <div class="form-group">
            <label for="libelle">
                Libellé du cours
            </label>
            <input type="text" id="libelle" name="libelle" class="form-control">
        </div>
    <input type="hidden" id="widthRow" name="nbcours" value="1">
    </form>
    <div class="panel panel-info">
        <table id="autotab" class="table">
            <tr class="info2">
                <th>
                    Partie
                </th>
                <th>
                    Type
                </th>
                <th>
                    HETD
                </th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="partie[0]" value="" placeholder="Identifiant de la partie" form="creer">
                </td>
                <td>
                    <select name="type[0]" form="creer" >
                        <option value="CM">CM</option>
                        <option value="TD">TD</option>
                        <option value="TP">TP</option>
                        <option value="Projet">Projet</option>
                    </select>
                    </td>
                <td>
                    <input type="text" name="hed[0]" value="" placeholder="HED" form="creer" >
                    </td>
            </tr>
        </table>
    </div>
    <br/>
</div>