@extends('layouts.user-profile-wide')

@section('subtitle', trans('app.family_tree'))

@section('user-content')

<?php
$childsTotal = 0;
$grandChildsTotal = 0;
$ggTotal = 0;
$ggcTotal = 0;
$ggccTotal = 0;
$lv6Total = 0;
$lv7Total = 0;
?>

<div id="wrapper">
    <span class="label">{{ link_to_route('users.tree', $user->name, [$user->id], ['title' => $user->name.' ('.$user->gender.')']) }}</span>
        @if ($childsCount = $user->childs->count())
        <?php $childsTotal += $childsCount ?>
        <div class="branch lv1">
            @foreach($user->childs as $child)
            <div class="entry {{ $childsCount == 1 ? 'sole' : '' }}">
                <span class="label">{{ link_to_route('users.tree', $child->name, [$child->id], ['title' => $child->name.' ('.$child->gender.')']) }}</span>
                @if ($grandsCount = $child->childs->count())
                <?php $grandChildsTotal += $grandsCount ?>
                <div class="branch lv2">
                    @foreach($child->childs as $grand)
                    <div class="entry {{ $grandsCount == 1 ? 'sole' : '' }}">
                        <span class="label">{{ link_to_route('users.tree', $grand->name, [$grand->id], ['title' => $grand->name.' ('.$grand->gender.')']) }}</span>
                        @if ($ggCount = $grand->childs->count())
                        <?php $ggTotal += $ggCount ?>
                        <div class="branch lv3">
                            @foreach($grand->childs as $gg)
                            <div class="entry {{ $ggCount == 1 ? 'sole' : '' }}">
                                <span class="label">{{ link_to_route('users.tree', $gg->name, [$gg->id], ['title' => $gg->name.' ('.$gg->gender.')']) }}</span>
                                @if ($ggcCount = $gg->childs->count())
                                <?php $ggcTotal += $ggcCount ?>
                                <div class="branch lv4">
                                    @foreach($gg->childs as $ggc)
                                    <div class="entry {{ $ggcCount == 1 ? 'sole' : '' }}">
                                        <span class="label">{{ link_to_route('users.tree', $ggc->name, [$ggc->id], ['title' => $ggc->name.' ('.$ggc->gender.')']) }}</span>
                                        @if ($ggccCount = $ggc->childs->count())
                                        <?php $ggccTotal += $ggccCount ?>
                                        <div class="branch lv5">
                                            @foreach($ggc->childs as $ggcc)
                                            <div class="entry {{ $ggccCount == 1 ? 'sole' : '' }}">
                                                <span class="label">{{ link_to_route('users.tree', $ggcc->name, [$ggcc->id], ['title' => $ggcc->name.' ('.$ggcc->gender.')']) }}</span>
                                                @if ($lv6Count = $ggcc->childs->count())
                                                <?php $lv6Total += $lv6Count ?>
                                                <div class="branch lv6">
                                                    @foreach($ggcc->childs as $ggcclv6)
                                                    <div class="entry {{ $lv6Count == 1 ? 'sole' : '' }}">
                                                        <span class="label">{{ link_to_route('users.tree', $ggcclv6->name, [$ggcclv6->id], ['title' => $ggcclv6->name.' ('.$ggcclv6->gender.')']) }}</span>
                                                        @if ($lv7Count = $ggcclv6->childs->count())
                                                        <?php $lv7Total += $lv7Count ?>
                                                        <div class="branch lv7">
                                                            @foreach($ggcclv6->childs as $ggcclv7)
                                                            <div class="entry {{ $lv6Count == 1 ? 'sole' : '' }}">
                                                                <span class="label">{{ link_to_route('users.tree', $ggcclv7->name, [$ggcclv7->id], ['title' => $ggcclv7->name.' ('.$ggcclv7->gender.')']) }}</span>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                        @endif
                                                    </div>
                                                    @endforeach
                                                </div>
                                                @endif
                                            </div>
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
<div class="container">
<hr>
<div class="row">
    @if ($childsTotal)
    <div class="col-md-1 text-right">{{ trans('app.child_count') }} <br><strong style="font-size:30px">{{ $childsTotal }}</strong></div>
    @endif
    @if ($grandChildsTotal)
    <div class="col-md-1 text-right">{{ trans('app.grand_child_count') }} <br><strong style="font-size:30px">{{ $grandChildsTotal }}</strong></div>
    @endif
    @if ($ggTotal)
    <div class="col-md-1 text-right">Jumlah Cicit <br><strong style="font-size:30px">{{ $ggTotal }}</strong></div>
    @endif
    @if ($ggcTotal)
    <div class="col-md-1 text-right">Keturunan ke 4 <br><strong style="font-size:30px">{{ $ggcTotal }}</strong></div>
    @endif
    @if ($ggccTotal)
    <div class="col-md-1 text-right">Keturunan ke 5 <br><strong style="font-size:30px">{{ $ggccTotal }}</strong></div>
    @endif
    @if ($lv6Total)
    <div class="col-md-1 text-right">Keturunan ke 6 <br><strong style="font-size:30px">{{ $lv6Total }}</strong></div>
    @endif
    @if ($lv7Total)
    <div class="col-md-1 text-right">Keturunan ke 7 <br><strong style="font-size:30px">{{ $lv7Total }}</strong></div>
    @endif
</div>
@endsection

@section ('ext_css')
<link rel="stylesheet" href="{{ asset('css/tree.css') }}">
@endsection
