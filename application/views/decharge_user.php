<div class="col-sm-9 col-md-9">
    <br/>
    <?php if(validation_errors() != null):?>
        <div class="alert alert-danger" role="alert"><?php echo validation_errors(); ?></div>
    <?php endif;?>

    <div class="col-md-offset-3 col-md-6">
        <?php echo form_open("Decharges") ?>
        <div class="form-group">
            <label for="pwd">
                Equivalent de la décharge en heures TD
            </label>
            <input type="number" class="form-control" id="decharge" name="decharge" value="<?=$decharge?>">
        </div>
        <button type="submit" value="ok" class="btn btn-primary btn-lg btn-block">
            Changer ma décharge
        </button>
        </form>
    </div>