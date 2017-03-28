@extends('layouts.master_page')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 m-x-auto pull-xs-none vamiddle">
            <div class="card">
                <div class="card-block p-a-2">
                    <h1>تعديل جلسة</h1>

                    {{ Form::open(['method' => 'PUT','route' => ['update_sitting',$sitting->sitting_id]]) }}

                    <div class="form-group">
                        <div class="col-sm-2"><label>تاريخ الجلسة</label></div>
                        <div class="col-sm-10"><input type="date" class="form-control"
                                                      name="sitting_date"
                                                      value="{{ $sitting->sitting_date }}" required autofocus></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2"><label>الاجراء المقبل</label></div>
                        <div class="col-sm-10"> <input  type="text" class="form-control"
                                                        name="next_procedure"
                                                        value="{{ $sitting->next_procedure }}" required></div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-2"><label>منطوق الحكم</label></div>
                        <div class="col-sm-10"><input type="text" class="form-control"
                                                      name="Verdict"
                                                      value="{{ $sitting->Verdict }}" required></div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-2"><label>الملف</label></div><?php echo "test";dd($files); ?>
                        <div class="col-sm-10"> <select name="file_reference" class="form-control">
                                
                                @if ($files)
                                    @foreach (@files as $f)
                                    <option value="{{ $f->file_reference }}">{{ $f->file_reference}}</option>
                                    @endforeach
                                @endif
                            </select></div>

                    </div>

                    <button type="submit" class="btn  btn-success">
                        <i class="icon-user-follow"></i>
                        حفظ الجلسة
                    </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
