@foreach($worker->cards as $quest)
        <div class="worker_quest_item">
                {{$quest->name}}<i style="cursor: pointer;margin-left: 5px" class="fas fa-times" onclick="delete_quest{{$quest->id}}()"></i>
        </div>
        <script>
            function delete_quest{{$quest->id}}() {
                var quest_id = "{{$quest->id}}"
                var worker_id = "{{$worker->id}}"
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-token': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/workers/update/delete_quest",
                    data: {
                        quest_id:quest_id,
                        worker_id:worker_id
                    },
                    success:function (result) {
                        $('#worker_quests').html(result);
                    }
                })
            }
        </script>
@endforeach