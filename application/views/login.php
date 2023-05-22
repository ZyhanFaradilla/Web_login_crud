<div class="row">
    <div class="col-md-4">
        <?=print_error()?>
        <form method="post"> 
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" name="user" autofocus />
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="pass" /> 
            </div>       
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Masuk <span class="glyphicon glyphicon-log-in"></span></button>
            </div>        
        </form>
    </div>      
</div>