@extends('social.master')

@section('css')
@parent
<link media="all" type="text/css" rel="stylesheet" href="/css/blocks.css">
@stop

@section('js')
@parent
<script src="/js/blocks.js"></script>
<script src="/js/avaliable.js"></script>
@stop

@section('body')
@parent


<div class="row">
  <div class="col-md-8 col-xs-12 col-sm-12">
    <div class="block">
      <div class="row">
        <div class="col-sm-10">
          <div class="row">
            <div class="col-md-12">
              <h3 class="text-blue"><i class="fa fa-file-text-o"></i> <b>AVALIAÇÃO</b></h3>
            </div>
            <div class="col-md-12">
              <ol class="breadcrumb bg-white">
                <li>{{ $exam->unit->offer->classe->period->course->institution->name }}</li>
                <li>{{ $exam->unit->offer->classe->period->course->name }}</li>
                <li>{{ $exam->unit->offer->classe->period->name }}</li>
                <li>{{ $exam->unit->offer->getClass()->fullName() }}</li>
                <li class="active">{{ $exam->unit->offer->discipline->name }}</li>
              </ol>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <a href='{{ URL::to("/lectures/units?u=" . encrypt($exam->unit_id)) }}' class="btn btn-default btn-block">Voltar</a>
        </div>

      </div>
    </div>

    <div id="block" class="block">
      <div class="row">
        <div class="col-md-12 col-xs-12">
            <h3>{{ $exam->title }}</h3>
        </div>
      </div>
      <hr>
@if( isset($exam->id) )
  {{ Form::hidden("exam", encrypt($exam->id)) }}
@else
  {{ Form::hidden("unit", encrypt($exam->unit_id)) }}
@endif
      <div class="row">
        <div class="col-md-8 col-xs-8">
          <span class="text-info"><i class="fa fa-calendar"></i>{{ " ". date("d / m / Y", strtotime($exam->date)) }}</span>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <span><i class="fa fa-comment text-info"></i> {{ $exam->comments == "" ? "Não há comentários" : $exam->comments }} </span>
        </div>
      </div>
    </div>

    <div class="block">
      <div class="block-list">
        <div class="row">
          <div class="col-md-12">
            <h3 class="text-blue"><b><i class="fa fa-bar-chart"></i> Inserção de Notas</b></h3>
          </div>
        </div>
        <div class="block-list-item">
          <div class="row">
            <div class="col-md-12">
              <ul class="list-inline">
                <li><i class="fa fa-undo icon-default"></i> Desfazer</li>
                <li><i class="fa fa-send text-info"></i> Salvar</li>
              </ul>


            {{ Form::open(["id" => "exam-form"]) }}

              <table class="table table-hover">
                <thead>
                  <tr>
                    <th style="width: 60%;">Nome</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id='{{ encrypt($exam->id) }}'>

@foreach($students as $student )
                  <tr id='{{ encrypt($student->id) }}'>
                    <td>{{ $student->getUser()->name }}</td>
                    <td>
                      <div class="form-inline">
                        <div class="form-inside pull-left">
                          {{ Form::text("exam-value", $student->getExamsValue($exam->id), ["class" => "form-control-1x form-control exam-value", "data" => $student->getExamsValue($exam->id)]) }}
                          <i class="fa fa-undo form-inside-icon icon-default click back-avaliable"></i>
                          <i class="fa fa-send form-inside-icon text-info click submit-avaliable"></i>
                        </div>
                        <div class="pull-left feedback-response small"></div>
                      </div>

                    </td>
                  </tr>
@endforeach

                </tbody>
              </table>

              </form>

            </div>
          </div>

          <br>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>

@stop
