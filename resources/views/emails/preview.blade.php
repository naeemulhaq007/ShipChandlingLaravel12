<div>
    <p>To: </p>
    <input type="email" class="form-control"  name="TxtSEmail" id="TxtSEmail" value="{{ $to }}">
    <p>Subject: </p>
    <input type="text" class="form-control" name="TxtSSubject" id="TxtSSubject" value="{{ $subject }}">
    <p>Message: </p>
    <textarea  class="form-control" name="TxtSMessage" id="TxtSMessage" value=""></textarea>

    <p>Attachment: <a href="{{ $attachmentPath }}">Excell File</p></a>
    <!-- Additional email content here -->
    <button id="BtnSendEmail" class="btn btn-primary"> Send Email</button>
</div>
