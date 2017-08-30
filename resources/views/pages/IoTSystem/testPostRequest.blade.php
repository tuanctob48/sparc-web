<div class="account-wall" style="padding-top: 5%">
    <form class="form-signin" method="POST" action="postDataNode" >
        <div style="padding-top: 5%">
            {{csrf_field() }}
            <input type="text" id="node_id" class="form-control" name="node_id" placeholder="node_id"  value="1" required autofocus>
            <input type="text" id="project_id" class="form-control" name="project_id" placeholder="project_id" value="1" required>
			<input type="text" id="temp_air" class="form-control" name="temp_air" placeholder="temp_air" value="1.0" required>
			<input type="text" id="airHumidity" class="form-control" name="airHumidity" placeholder="airHumidity" value="1.0" required>
			<input type="text" id="luuLuong" class="form-control" name="luuLuong" placeholder="luuLuong"  value="1.0" required>    
			<input type="text" id="tempWater" class="form-control" name="tempWater" placeholder="tempWater" value="1.0" required>    
			<input type="text" id="anhSangKK" class="form-control" name="anhSangKK" placeholder="anhSangKK" value="1.0" required>    
			<input type="text" id="red" class="form-control" name="red" placeholder="red" value="1.0" required>    
			<input type="text" id="blue" class="form-control" name="blue" placeholder="blue" value="1.0" required>    
			<input type="text" id="green" class="form-control" name="green" placeholder="green"  value="1.0" required>    
			<input type="text" id="anhSangWater" class="form-control" name="anhSangWater" placeholder="anhSangWater"  value="1.0" required>    
		</div>
        <div style="padding-top: 10%;padding-left: 35%;width: 200px">
            <button class="btn btn-primary btn-block" type="submit">Upload</button>
        </div>
    </form>
</div>