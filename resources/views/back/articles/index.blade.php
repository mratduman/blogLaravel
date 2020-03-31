@extends('back.layouts.master')
@section('title','Yazılar')
@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"><strong>{{ $articles->count() }}</strong> Yazı Listelendi</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Görüntü</th>
              <th>Başlık</th>
              <th>Kategori</th>
              <th>Hit</th>
              <th>Tarih</th>
              <th>Durum</th>
              <th>İşlemler</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($articles as $article)
              <tr>
                <td>
                  <a href="{{ $article->image }}" target="_blank">{{ $article->id }}</a>
                </td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->getCategory->name }}</td>
                <td>{{ $article->hit }}</td>
                <td>{{ $article->created_at->diffforHumans() }}</td>
                <td>
                  @php
                    $status = str_replace("0","<span class='text-success'>Aktif</span>",$article->is_deleted);
                    $status = str_replace("1","<span class='text-danger'>Pasif</span>",$status);
                  @endphp
                  {!! $status !!}
                </td>
                <td>
                  <a href="#" title="Aç" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                  <a href="#" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                  <a href="#" title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
