<div class="modal fade bd-example-modal-lg" id="chart"  tabindex="-1" role="dialog" aria-labelledby="searchrmod" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div  class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Search in Chart Of Account</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body gc-modal-body">
            <div class="containers">
                <ul>
                @foreach (DB::table('acfile3')->where('BranchCode',$BranchCode)->where('ACode2',0)->where('ACode3',0)->orderBy('acode1')->orderBy('acode2')->orderBy('acode3')->orderBy('acode4')->orderBy('acode5')->orderBy('ACODE6')->orderBy('ACODE7')->get() as $l1)
                <li ><a class="parrent" data-acname="{{ $l1->AcName3 }}" data-accode="{{ $l1->ActCode }}"
                    data-accode3="{{ $l1->AcCode3 }}"
                    data-acname3="{{ $l1->AcName3 }}"
                    data-accode2="{{ $l1->AcCode2 }}"
                    data-accode1="{{ $l1->AcCode1 }}"
                    data-chkinactive="{{ $l1->ChkInactive }}"
                    data-openingbalance="{{ $l1->OpeningBalance }}"
                    data-chksupplier="{{ $l1->ChkSupplier }}"
                    data-chkcustomer="{{ $l1->ChkCustomer }}"
                    data-chkexpence="{{ $l1->ChkExpence }}"
                    data-raddebittrans="{{ $l1->RadDebitTrans }}"
                    data-radcredittrans="{{ $l1->RadCreditTrans }}"
                    data-raddebit="{{ $l1->RadDebit }}"
                    data-radcredit="{{ $l1->RadCredit }}"
                    data-chkrecac="{{ $l1->ChkRecAC }}"
                    data-address="{{ $l1->Address }}"
                    data-chklabour="{{ $l1->ChkLabour }}"
                    data-branchcode="{{ $l1->BranchCode }}"
                    data-opttype="{{ $l1->OptType }}"
                    data-acode1="{{ $l1->acode1 }}"
                    data-acode2="{{ $l1->acode2 }}"
                    data-acode3="{{ $l1->acode3 }}"
                    data-acode4="{{ $l1->acode4 }}"
                    data-acode5="{{ $l1->acode5 }}"
                    data-acode6="{{ $l1->acode6 }}"
                    data-acode7="{{ $l1->acode7 }}"
                    data-acode8="{{ $l1->acode8 }}"
                    data-acode9="{{ $l1->acode9 }}"
                    data-acode10="{{ $l1->acode10 }}"
                    data-aclevel="{{ $l1->AcLevel }}"
                    data-titlelevel1="{{ $l1->TitleLevel1 }}"
                    data-titlelevel2="{{ $l1->TitleLevel2 }}"
                    data-titlelevel3="{{ $l1->TitleLevel3 }}"
                    data-titlelevel4="{{ $l1->TitleLevel4 }}"
                    data-titlelevel5="{{ $l1->TitleLevel5 }}"
                    data-address1="{{ $l1->Address1 }}"
                    data-address2="{{ $l1->Address2 }}"
                    data-address3="{{ $l1->Address3 }}"
                    data-actype="{{ $l1->Actype }}"
                    data-gst="{{ $l1->gst }}"
                    data-sameaddress="{{ $l1->sameaddress }}"
                    data-phone="{{ $l1->phone }}"
                    data-fax="{{ $l1->fax }}"
                    data-email="{{ $l1->email }}"
                    data-optype="{{ $l1->OpType }}"
                    data-chksalesman="{{ $l1->ChkSalesMan }}"
                    data-chkcrbill="{{ $l1->ChkCrBill }}"
                    data-workuser="{{ $l1->WorkUser }}"
                    data-chknocost="{{ $l1->ChkNoCost }}"
                    data-chkincome="{{ $l1->ChkIncome }}"
                    data-chkdepreciation="{{ $l1->ChkDepreciation }}"  >{{ $l1->AcName3 }}</a>
                    <ul>
                    @foreach (DB::table('acfile3')->where('BranchCode',$BranchCode)->where('TitleLevel1',$l1->AcName3)->where('ACode3',0)->orderBy('acode1')->orderBy('acode2')->orderBy('acode3')->orderBy('acode4')->orderBy('acode5')->orderBy('ACODE6')->orderBy('ACODE7')->get() as $l2)
                        <li id="child"><a class="parrent" data-acname="{{ $l2->AcName3 }}" data-accode="{{ $l2->ActCode }}"
                            data-accode3="{{ $l2->AcCode3 }}"
                            data-acname3="{{ $l2->AcName3 }}"
                            data-accode2="{{ $l2->AcCode2 }}"
                            data-accode1="{{ $l2->AcCode1 }}"
                            data-chkinactive="{{ $l2->ChkInactive }}"
                            data-openingbalance="{{ $l2->OpeningBalance }}"
                            data-chksupplier="{{ $l2->ChkSupplier }}"
                            data-chkcustomer="{{ $l2->ChkCustomer }}"
                            data-chkexpence="{{ $l2->ChkExpence }}"
                            data-raddebittrans="{{ $l2->RadDebitTrans }}"
                            data-radcredittrans="{{ $l2->RadCreditTrans }}"
                            data-raddebit="{{ $l2->RadDebit }}"
                            data-radcredit="{{ $l2->RadCredit }}"
                            data-chkrecac="{{ $l2->ChkRecAC }}"
                            data-address="{{ $l2->Address }}"
                            data-chklabour="{{ $l2->ChkLabour }}"
                            data-branchcode="{{ $l2->BranchCode }}"
                            data-opttype="{{ $l2->OptType }}"
                            data-acode1="{{ $l2->acode1 }}"
                            data-acode2="{{ $l2->acode2 }}"
                            data-acode3="{{ $l2->acode3 }}"
                            data-acode4="{{ $l2->acode4 }}"
                            data-acode5="{{ $l2->acode5 }}"
                            data-acode6="{{ $l2->acode6 }}"
                            data-acode7="{{ $l2->acode7 }}"
                            data-acode8="{{ $l2->acode8 }}"
                            data-acode9="{{ $l2->acode9 }}"
                            data-acode10="{{ $l2->acode10 }}"
                            data-aclevel="{{ $l2->AcLevel }}"
                            data-titlelevel1="{{ $l2->TitleLevel1 }}"
                            data-titlelevel2="{{ $l2->TitleLevel2 }}"
                            data-titlelevel3="{{ $l2->TitleLevel3 }}"
                            data-titlelevel4="{{ $l2->TitleLevel4 }}"
                            data-titlelevel5="{{ $l2->TitleLevel5 }}"
                            data-address1="{{ $l2->Address1 }}"
                            data-address2="{{ $l2->Address2 }}"
                            data-address3="{{ $l2->Address3 }}"
                            data-actype="{{ $l2->Actype }}"
                            data-gst="{{ $l2->gst }}"
                            data-sameaddress="{{ $l2->sameaddress }}"
                            data-phone="{{ $l2->phone }}"
                            data-fax="{{ $l2->fax }}"
                            data-email="{{ $l2->email }}"
                            data-optype="{{ $l2->OpType }}"
                            data-chksalesman="{{ $l2->ChkSalesMan }}"
                            data-chkcrbill="{{ $l2->ChkCrBill }}"
                            data-workuser="{{ $l2->WorkUser }}"
                            data-chknocost="{{ $l2->ChkNoCost }}"
                            data-chkincome="{{ $l2->ChkIncome }}"
                            data-chkdepreciation="{{ $l2->ChkDepreciation }}">{{ $l2->AcName3 }}</a>
                            <ul>
                            @foreach (DB::table('acfile3')->where('BranchCode',$BranchCode)->where('TitleLevel1',$l1->AcName3)->where('TitleLevel2',$l2->AcName3)->orderBy('acode1')->orderBy('acode2')->orderBy('acode3')->orderBy('acode4')->orderBy('acode5')->orderBy('ACODE6')->orderBy('ACODE7')->get() as $l3)
                                <li id="grandchild"><a class="parrent" data-acname="{{ $l3->AcName3 }}" data-accode="{{ $l3->ActCode }}"
                                    data-accode3="{{ $l3->AcCode3 }}"
                                    data-acname3="{{ $l3->AcName3 }}"
                                    data-accode2="{{ $l3->AcCode2 }}"
                                    data-accode1="{{ $l3->AcCode1 }}"
                                    data-chkinactive="{{ $l3->ChkInactive }}"
                                    data-openingbalance="{{ $l3->OpeningBalance }}"
                                    data-chksupplier="{{ $l3->ChkSupplier }}"
                                    data-chkcustomer="{{ $l3->ChkCustomer }}"
                                    data-chkexpence="{{ $l3->ChkExpence }}"
                                    data-raddebittrans="{{ $l3->RadDebitTrans }}"
                                    data-radcredittrans="{{ $l3->RadCreditTrans }}"
                                    data-raddebit="{{ $l3->RadDebit }}"
                                    data-radcredit="{{ $l3->RadCredit }}"
                                    data-chkrecac="{{ $l3->ChkRecAC }}"
                                    data-address="{{ $l3->Address }}"
                                    data-chklabour="{{ $l3->ChkLabour }}"
                                    data-branchcode="{{ $l3->BranchCode }}"
                                    data-opttype="{{ $l3->OptType }}"
                                    data-acode1="{{ $l3->acode1 }}"
                                    data-acode2="{{ $l3->acode2 }}"
                                    data-acode3="{{ $l3->acode3 }}"
                                    data-acode4="{{ $l3->acode4 }}"
                                    data-acode5="{{ $l3->acode5 }}"
                                    data-acode6="{{ $l3->acode6 }}"
                                    data-acode7="{{ $l3->acode7 }}"
                                    data-acode8="{{ $l3->acode8 }}"
                                    data-acode9="{{ $l3->acode9 }}"
                                    data-acode10="{{ $l3->acode10 }}"
                                    data-aclevel="{{ $l3->AcLevel }}"
                                    data-titlelevel1="{{ $l3->TitleLevel1 }}"
                                    data-titlelevel2="{{ $l3->TitleLevel2 }}"
                                    data-titlelevel3="{{ $l3->TitleLevel3 }}"
                                    data-titlelevel4="{{ $l3->TitleLevel4 }}"
                                    data-titlelevel5="{{ $l3->TitleLevel5 }}"
                                    data-address1="{{ $l3->Address1 }}"
                                    data-address2="{{ $l3->Address2 }}"
                                    data-address3="{{ $l3->Address3 }}"
                                    data-actype="{{ $l3->Actype }}"
                                    data-gst="{{ $l3->gst }}"
                                    data-sameaddress="{{ $l3->sameaddress }}"
                                    data-phone="{{ $l3->phone }}"
                                    data-fax="{{ $l3->fax }}"
                                    data-email="{{ $l3->email }}"
                                    data-optype="{{ $l3->OpType }}"
                                    data-chksalesman="{{ $l3->ChkSalesMan }}"
                                    data-chkcrbill="{{ $l3->ChkCrBill }}"
                                    data-workuser="{{ $l3->WorkUser }}"
                                    data-chknocost="{{ $l3->ChkNoCost }}"
                                    data-chkincome="{{ $l3->ChkIncome }}"
                                    data-chkdepreciation="{{ $l3->ChkDepreciation }}">{{ $l3->AcName3 }}</a>
                                    {{-- <ul>
                                        @foreach (DB::table('acfile3')->where('BranchCode',$BranchCode)->where('TitleLevel1',$l1->AcName3)->where('TitleLevel2',$l2->AcName3)->where('TitleLevel3',$l3->AcName3)->orderBy('acode1')->orderBy('acode2')->orderBy('acode3')->orderBy('acode4')->orderBy('acode5')->orderBy('ACODE6')->orderBy('ACODE7')->get() as $l4)
                                        @if ($l4)
                                        <li id="dgrandchild"><a class="parrent" data-acname="{{ $l4->AcName3 }}" data-accode="{{ $l4->ActCode }}">{{ $l4->AcName3 }}</a>
                                            </li>
                                        @endif
                                        @endforeach
                                    </ul> --}}
                                </li>
                            @endforeach
                            </ul>
                        </li>
                    @endforeach
                    </ul>
                </li>
            @endforeach
                </ul>
            </div>
        </div>

      </div>
    </div>
  </div>
