<h1>Test sending email</h1>
    {!! Form::open(['method' => 'post', 'url' => 'mail-send']) !!}
		
		<div class="form-group">
			<label for="email">Send To</label>
			<input type="email" name="email" class="form-control" id="email" placeholder="Email">
		</div>
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" class="form-control" id="title" placeholder="Title">
		</div>
		<div class="form-group">
			<label for="message">Message</label>
			<input type="text" class="form-control" id="message" placeholder="Message">
		</div>
		<button type="submit" class="btn btn-default">Send</button>
		
    {!! Form::close() !!}