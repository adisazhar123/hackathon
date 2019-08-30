@extends('layouts.app')

@section('body')
    <div id="body">
        <div class="container" style="width:60%">
            <span>Add new {{$type}}</span>
            <!-- <form id="create_campaign_form"> -->
            <div class="form-group">
                <label for="title">Title</label>
                <input name="title" type="text" class="form-control" id="title" aria-describedby="title_campaign" placeholder="Enter title of campaign">
                <small id="titleHelp" class="form-text text-muted">Name your campaign.</small>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="text" name="deadline" class="form-control" id="deadline" aria-describedby="deadline" placeholder="2019-04-15">
            </div>
            <div class="form-group">
                <label for="banner">Banner</label>
                <input type="text" name="banner" class="form-control" id="banner" aria-describedby="banner" placeholder="http://pexels.com/id-image">
            </div>
            <div class="form-group">
                <label for="target_amount">Target Amount</label>
                <input type="number" name="target_amount" class="form-control" id="target_amount" aria-describedby="target_campaign" placeholder="1000000">
                <input type="hidden" name="campaign_type" class="form-control" id="campaign_type" value="{{$type}}">
                <input type="hidden" name="users_id" class="form-control" id="users_id" value="{{Auth::id()}}">
            </div><br />
            <button type="button" class="btn btn-primary" id="submit_wishlist_campaign">Submit</button>
            <!-- </form> -->
        </div>
    </div>
@endsection


@section('script')
    <script>
        const dataObject = {
            title: '',
            description: '',
            deadline: '',
            target_amount: 0,
            campaign_type: 'wishlist',
            users_id: {{Auth::id()}},
            banner_path: ''
        }

        $("#submit_wishlist_campaign").click(function () {
            let title = $('#title').val();
            if (title === null || title === '') {
                return 'Title is require';
            }
            dataObject.title = title;

            let desc = $('#description').val();
            if (desc === null || desc === '') {
                return 'Description is require';
            }
            dataObject.description = desc;

            let deadline = $('#deadline').val();
            if (deadline === null || deadline === '') {
                return 'Deadline is require';
            }
            dataObject.deadline = deadline;

            let target = $('#target_amount').val();
            if (target === null || target <= 0) {
                return 'Target amount must greater than 0';
            }
            dataObject.target_amount = target;

            let banner = $('#banner').val();
            if (banner === null || banner === '') {
                const message = 'Banner is required';
                alert(message);
                return 'Banner is required';
            }
            dataObject.banner_path = banner;

            $.ajax({
                url: `/create_campaign`,
                method: 'POST',
                data: dataObject,
                success: function(data) {
                    console.log(data);
                    alert('success')
                },
                error: function (data) {
                    console.log(data);
                    alert("error")
                }
            });
        });
    </script>
@endsection
