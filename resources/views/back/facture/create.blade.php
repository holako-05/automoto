@extends($layout)
@section('css')
<link rel="stylesheet" href="/assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="/assets/vendor/libs/flatpickr/flatpickr.css" />
<link rel="stylesheet" href="/assets/vendor/css/pages/app-invoice.css" />

@stop
@section('content')

            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row invoice-add">
                  <!-- Invoice Add-->
                  <div class="col-lg-9 col-12 mb-lg-0 mb-4">
                    <div class="card invoice-preview-card">
                      <div class="card-body">
                        <div class="row p-sm-3 p-0">
                          <div class="col-md-6 mb-md-0 mb-4">
                            <div class="d-flex svg-illustration mb-4 gap-2">
                              <span class="app-brand-logo demo">
                                <svg
                                  width="25"
                                  viewBox="0 0 25 42"
                                  version="1.1"
                                  xmlns="http://www.w3.org/2000/svg"
                                  xmlns:xlink="http://www.w3.org/1999/xlink">
                                  <defs>
                                    <path
                                      d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                                      id="path-1"></path>
                                    <path
                                      d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                                      id="path-3"></path>
                                    <path
                                      d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                                      id="path-4"></path>
                                    <path
                                      d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                                      id="path-5"></path>
                                  </defs>
                                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                                          <mask id="mask-2" fill="white">
                                            <use xlink:href="#path-1"></use>
                                          </mask>
                                          <use fill="#696cff" xlink:href="#path-1"></use>
                                          <g id="Path-3" mask="url(#mask-2)">
                                            <use fill="#696cff" xlink:href="#path-3"></use>
                                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                                          </g>
                                          <g id="Path-4" mask="url(#mask-2)">
                                            <use fill="#696cff" xlink:href="#path-4"></use>
                                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                                          </g>
                                        </g>
                                        <g
                                          id="Triangle"
                                          transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                                          <use fill="#696cff" xlink:href="#path-5"></use>
                                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                                        </g>
                                      </g>
                                    </g>
                                  </g>
                                </svg>
                              </span>
                              <span class="app-brand-text demo text-body fw-bold">{{$companyRecords->name}}</span>
                            </div>
                            <p class="mb-1">{{$companyRecords->postal_address}}</p>
                            <p class="mb-1">{{$companyRecords->city .", ".$companyRecords->country}}</p>
                            <p class="mb-0">{{$companyRecords->phone_number}}</p>
                          </div>
                          <div class="col-md-6">
                            <dl class="row mb-2">
                              <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                                <span class="h4 text-capitalize mb-0 text-nowrap">Invoice #</span>
                              </dt>
                              <dd class="col-sm-6 d-flex justify-content-md-end">
                                <div class="w-px-150">
                                  <input
                                    type="text"
                                    class="form-control"
                                    disabled
                                    placeholder="3905"
                                    value="3905"
                                    id="invoiceId" />
                                </div>
                              </dd>
                              <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                                <span class="fw-normal">Date:</span>
                              </dt>
                              <dd class="col-sm-6 d-flex justify-content-md-end">
                                <div class="w-px-150">
                                  <input type="text" class="form-control date-picker" placeholder="YYYY-MM-DD" />
                                </div>
                              </dd>
                              <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                                <span class="fw-normal">Due Date:</span>
                              </dt>
                              <dd class="col-sm-6 d-flex justify-content-md-end">
                                <div class="w-px-150">
                                  <input type="text" class="form-control date-picker" placeholder="YYYY-MM-DD" />
                                </div>
                              </dd>
                            </dl>
                          </div>
                        </div>

                        <hr class="my-4 mx-n4" />

                        <div class="row p-sm-3 p-0">
                          <div class="col-md-6 col-sm-5 col-12 mb-sm-0 mb-4">
                            <h6 class="pb-2">Facture Pour:</h6>
                            <p class="mb-1">{{$clientRecords->first_name." ".$clientRecords->last_name}}</p>
                            <p class="mb-1"><b>Adresse :</b> {{$clientRecords->address}}</p>
                            <p class="mb-1"><b>Email :</b> {{$clientRecords->email}}</p>
                            <p class="mb-1"><b>Telephone :</b> {{$clientRecords->phone}}</p>
                          </div>
                          <div class="col-md-6 col-sm-7">
                            <h6 class="pb-2">Bill To:</h6>
                            <table>
                              <tbody>
                                <tr>
                                  <td class="pe-3">Total Due:</td>
                                  <td>$12,110.55</td>
                                </tr>
                                <tr>
                                  <td class="pe-3">Bank name:</td>
                                  <td>American Bank</td>
                                </tr>
                                <tr>
                                  <td class="pe-3">Country:</td>
                                  <td>United States</td>
                                </tr>
                                <tr>
                                  <td class="pe-3">IBAN:</td>
                                  <td>ETD95476213874685</td>
                                </tr>
                                <tr>
                                  <td class="pe-3">SWIFT code:</td>
                                  <td>BR91905</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>

                        <hr class="mx-n4" />

                        <form class="source-item py-sm-3">
                          <div class="mb-3" data-repeater-list="group-a">
                            <div class="repeater-wrapper pt-0 pt-md-4" data-repeater-item>
                              <div class="d-flex border rounded position-relative pe-0">
                                <div class="row w-100 m-0 p-3">
                                  <div class="col-md-6 col-12 mb-md-0 mb-3 ps-md-0">
                                    <p class="mb-2 repeater-title">Item</p>
                                    <select class="form-select item-details mb-2">
                                      <option selected disabled>Select Item</option>
                                      <option value="App Design">App Design</option>
                                      <option value="App Customization">App Customization</option>
                                      <option value="ABC Template">ABC Template</option>
                                      <option value="App Development">App Development</option>
                                    </select>
                                    <textarea class="form-control" rows="2" placeholder="Item Information"></textarea>
                                  </div>
                                  <div class="col-md-3 col-12 mb-md-0 mb-3">
                                    <p class="mb-2 repeater-title">Cost</p>
                                    <input
                                      type="number"
                                      class="form-control invoice-item-price mb-2"
                                      placeholder="00"
                                      min="12" />
                                    <div>
                                      <span>Discount:</span>
                                      <span class="discount me-2">0%</span>
                                      <span
                                        class="tax-1 me-2"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="Tax 1"
                                        >0%</span
                                      >
                                      <span class="tax-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Tax 2"
                                        >0%</span
                                      >
                                    </div>
                                  </div>
                                  <div class="col-md-2 col-12 mb-md-0 mb-3">
                                    <p class="mb-2 repeater-title">Qty</p>
                                    <input
                                      type="number"
                                      class="form-control invoice-item-qty"
                                      placeholder="1"
                                      min="1"
                                      max="50" />
                                  </div>
                                  <div class="col-md-1 col-12 pe-0">
                                    <p class="mb-2 repeater-title">Price</p>
                                    <p class="mb-0">$24.00</p>
                                  </div>
                                </div>
                                <div
                                  class="d-flex flex-column align-items-center justify-content-between border-start p-2">
                                  <i class="bx bx-x fs-4 text-muted cursor-pointer" data-repeater-delete></i>
                                  <div class="dropdown">
                                    <i
                                      class="bx bx-cog bx-xs text-muted cursor-pointer more-options-dropdown"
                                      role="button"
                                      id="dropdownMenuButton"
                                      data-bs-toggle="dropdown"
                                      data-bs-auto-close="outside"
                                      aria-expanded="false">
                                    </i>
                                    <div
                                      class="dropdown-menu dropdown-menu-end w-px-300 p-3"
                                      aria-labelledby="dropdownMenuButton">
                                      <div class="row g-3">
                                        <div class="col-12">
                                          <label for="discountInput" class="form-label">Discount(%)</label>
                                          <input
                                            type="number"
                                            class="form-control"
                                            id="discountInput"
                                            min="0"
                                            max="100" />
                                        </div>
                                        <div class="col-md-6">
                                          <label for="taxInput1" class="form-label">Tax 1</label>
                                          <select name="tax-1-input" id="taxInput1" class="form-select tax-select">
                                            <option value="0%" selected>0%</option>
                                            <option value="1%">1%</option>
                                            <option value="10%">10%</option>
                                            <option value="18%">18%</option>
                                            <option value="40%">40%</option>
                                          </select>
                                        </div>
                                        <div class="col-md-6">
                                          <label for="taxInput2" class="form-label">Tax 2</label>
                                          <select name="tax-2-input" id="taxInput2" class="form-select tax-select">
                                            <option value="0%" selected>0%</option>
                                            <option value="1%">1%</option>
                                            <option value="10%">10%</option>
                                            <option value="18%">18%</option>
                                            <option value="40%">40%</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="dropdown-divider my-3"></div>
                                      <button type="button" class="btn btn-label-primary btn-apply-changes">Apply</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12">
                              <button type="button" class="btn btn-primary" data-repeater-create>Add Item</button>
                            </div>
                          </div>
                        </form>

                        <hr class="my-4 mx-n4" />

                        <div class="row py-sm-3">
                          <div class="col-md-6 mb-md-0 mb-3">
                            <div class="d-flex align-items-center mb-3">
                              <label for="salesperson" class="form-label me-5 fw-medium">Salesperson:</label>
                              <input type="text" class="form-control" id="salesperson" placeholder="Edward Crowley" />
                            </div>
                            <input
                              type="text"
                              class="form-control"
                              id="invoiceMsg"
                              placeholder="Thanks for your business" />
                          </div>
                          <div class="col-md-6 d-flex justify-content-end">
                            <div class="invoice-calculations">
                              <div class="d-flex justify-content-between mb-2">
                                <span class="w-px-100">Subtotal:</span>
                                <span class="fw-medium">$00.00</span>
                              </div>
                              <div class="d-flex justify-content-between mb-2">
                                <span class="w-px-100">Discount:</span>
                                <span class="fw-medium">$00.00</span>
                              </div>
                              <div class="d-flex justify-content-between mb-2">
                                <span class="w-px-100">Tax:</span>
                                <span class="fw-medium">$00.00</span>
                              </div>
                              <hr />
                              <div class="d-flex justify-content-between">
                                <span class="w-px-100">Total:</span>
                                <span class="fw-medium">$00.00</span>
                              </div>
                            </div>
                          </div>
                        </div>

                        <hr class="my-4" />

                        <div class="row">
                          <div class="col-12">
                            <div class="mb-3">
                              <label for="note" class="form-label fw-medium">Note:</label>
                              <textarea class="form-control" rows="2" id="note" placeholder="Invoice note"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /Invoice Add-->

                  <!-- Invoice Actions -->
                  <div class="col-lg-3 col-12 invoice-actions">
                    <div class="card mb-4">
                      <div class="card-body">
                        <button
                          class="btn btn-primary d-grid w-100 mb-3"
                          data-bs-toggle="offcanvas"
                          data-bs-target="#sendInvoiceOffcanvas">
                          <span class="d-flex align-items-center justify-content-center text-nowrap"
                            ><i class="bx bx-paper-plane bx-xs me-1"></i>Send Invoice</span
                          >
                        </button>
                        <a href="./app-invoice-preview.html" class="btn btn-label-secondary d-grid w-100 mb-3">Preview</a>
                        <button type="button" class="btn btn-label-secondary d-grid w-100">Save</button>
                      </div>
                    </div>
                    <div>
                      <p class="mb-2">Accept payments via</p>
                      <select class="form-select mb-4">
                        <option value="Bank Account">Bank Account</option>
                        <option value="Paypal">Paypal</option>
                        <option value="Card">Credit/Debit Card</option>
                        <option value="UPI Transfer">UPI Transfer</option>
                      </select>
                      <div class="d-flex justify-content-between mb-2">
                        <label for="payment-terms" class="mb-0">Payment Terms</label>
                        <label class="switch switch-primary me-0">
                          <input type="checkbox" class="switch-input" id="payment-terms" checked="" />
                          <span class="switch-toggle-slider">
                            <span class="switch-on">
                              <i class="bx bx-check"></i>
                            </span>
                            <span class="switch-off">
                              <i class="bx bx-x"></i>
                            </span>
                          </span>
                          <span class="switch-label"></span>
                        </label>
                      </div>
                      <div class="d-flex justify-content-between mb-2">
                        <label for="client-notes" class="mb-0">Client Notes</label>
                        <label class="switch switch-primary me-0">
                          <input type="checkbox" class="switch-input" id="client-notes" />
                          <span class="switch-toggle-slider">
                            <span class="switch-on">
                              <i class="bx bx-check"></i>
                            </span>
                            <span class="switch-off">
                              <i class="bx bx-x"></i>
                            </span>
                          </span>
                          <span class="switch-label"></span>
                        </label>
                      </div>
                      <div class="d-flex justify-content-between">
                        <label for="payment-stub" class="mb-0">Payment Stub</label>
                        <label class="switch switch-primary me-0">
                          <input type="checkbox" class="switch-input" id="payment-stub" />
                          <span class="switch-toggle-slider">
                            <span class="switch-on">
                              <i class="bx bx-check"></i>
                            </span>
                            <span class="switch-off">
                              <i class="bx bx-x"></i>
                            </span>
                          </span>
                          <span class="switch-label"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <!-- /Invoice Actions -->
                </div>

                <!-- Offcanvas -->
                <!-- Send Invoice Sidebar -->
                <div class="offcanvas offcanvas-end" id="sendInvoiceOffcanvas" aria-hidden="true">
                  <div class="offcanvas-header mb-3">
                    <h5 class="offcanvas-title">Send Invoice</h5>
                    <button
                      type="button"
                      class="btn-close text-reset"
                      data-bs-dismiss="offcanvas"
                      aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body flex-grow-1">
                    <form>
                      <div class="mb-3">
                        <label for="invoice-from" class="form-label">From</label>
                        <input
                          type="text"
                          class="form-control"
                          id="invoice-from"
                          value="shelbyComapny@email.com"
                          placeholder="company@email.com" />
                      </div>
                      <div class="mb-3">
                        <label for="invoice-to" class="form-label">To</label>
                        <input
                          type="text"
                          class="form-control"
                          id="invoice-to"
                          value="qConsolidated@email.com"
                          placeholder="company@email.com" />
                      </div>
                      <div class="mb-3">
                        <label for="invoice-subject" class="form-label">Subject</label>
                        <input
                          type="text"
                          class="form-control"
                          id="invoice-subject"
                          value="Invoice of purchased Admin Templates"
                          placeholder="Invoice regarding goods" />
                      </div>
                      <div class="mb-3">
                        <label for="invoice-message" class="form-label">Message</label>
                        <textarea class="form-control" name="invoice-message" id="invoice-message" cols="3" rows="8">
  Dear Queen Consolidated,
            Thank you for your business, always a pleasure to work with you!
            We have generated a new invoice in the amount of $95.59
            We would appreciate payment of this invoice by 05/11/2021</textarea
                        >
                      </div>
                      <div class="mb-4">
                        <span class="badge bg-label-primary">
                          <i class="bx bx-link bx-xs"></i>
                          <span class="align-middle">Invoice Attached</span>
                        </span>
                      </div>
                      <div class="mb-3 d-flex flex-wrap">
                        <button type="button" class="btn btn-primary me-3" data-bs-dismiss="offcanvas">Send</button>
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- /Send Invoice Sidebar -->

                <!-- /Offcanvas -->
              </div>
              <!-- / Content -->
{{-- <div class="container-fluid flex-grow-1 container-p-y">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <div class="d-flex flex-column justify-content-center">
            <h4 class="py-3 mb-4">Gestion des factures</h4>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin') }}">Accueil</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="{{ route('facture.index') }}">Liste des factures</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Multi Column with Form Separator -->
    <div class="card mb-4">
        <h5 class="card-header"></h5>
        <form class="card-body" method="POST" action="{{ route('facture.store') }}">
            @csrf
            <div class="row g-3">
                   @can('facture.code.create')
   <div class="col-md-6">
       <label class="form-label" for="code">Code</label>
       <input type="text" name="code" id="code" class="form-control" placeholder="Code" value="{{ old('code') }}" />
       @error('code')
       <span class="helper-text text-danger">{{ $message }}</span>
       @enderror
   </div>
   @endcan   @can('facture.title.create')
   <div class="col-md-6">
       <label class="form-label" for="title">Titre</label>
       <input type="text" name="title" id="title" class="form-control" placeholder="Titre" value="{{ old('title') }}" />
       @error('title')
       <span class="helper-text text-danger">{{ $message }}</span>
       @enderror
   </div>
   @endcan   @can('facture.prix_total.create')
   <div class="col-md-6">
       <label class="form-label" for="prix_total">Prix</label>
       <input type="text" name="prix_total" id="prix_total" class="form-control" placeholder="Prix" value="{{ old('prix_total') }}" />
       @error('prix_total')
       <span class="helper-text text-danger">{{ $message }}</span>
       @enderror
   </div>
   @endcan   @can('facture.condition_paiment.create')
   <div class="col-md-6">
       <label class="form-label" for="condition_paiment">Condition</label>
       <input type="text" name="condition_paiment" id="condition_paiment" class="form-control" placeholder="Condition" value="{{ old('condition_paiment') }}" />
       @error('condition_paiment')
       <span class="helper-text text-danger">{{ $message }}</span>
       @enderror
   </div>
   @endcan   @can('facture.is_tva.create')
   <div class="col-md-6">
       <label class="form-label" for="is_tva">Tva</label>
       <input type="text" name="is_tva" id="is_tva" class="form-control" placeholder="Tva" value="{{ old('is_tva') }}" />
       @error('is_tva')
       <span class="helper-text text-danger">{{ $message }}</span>
       @enderror
   </div>
   @endcan   @can('facture.echeance.create')
   <div class="col-md-6">
       <label class="form-label" for="echeance">Echéance</label>
       <input type="text" class="form-control quicky-date" placeholder="YYYY-MM-DD" id="echeance" name="echeance" value="{{ old('echeance') }}" />
       @error('echeance')
       <span class="helper-text text-danger">{{ $message }}</span>
       @enderror
   </div>
   @endcan


            <!--updates_fields-->
            </div>
            <hr class="my-4 mx-n4" />
            <div class="pt-4 float-end">
                <button type="submit" class="btn btn-primary me-sm-3 me-1">Enregistrer</button>
            </div>
            <div class="pt-4 float-start">
                <button type="reset" class="btn btn-label-secondary">Vider</button>
                <a href="{{ route('facture.index') }}" class="btn btn-label-secondary">Retour</a>
            </div>
        </form>
    </div>
</div> --}}
@stop
@section('js')

<script src="/assets/vendor/libs/select2/select2.js"></script>
<script src="/assets/js/forms-selects.js"></script>
<script src="/assets/vendor/libs/flatpickr/flatpickr.js"></script>

   <!-- Vendors JS -->
   <script src="/assets/vendor/libs/flatpickr/flatpickr.js"></script>
   <script src="/assets/vendor/libs/cleavejs/cleave.js"></script>
   <script src="/assets/vendor/libs/cleavejs/cleave-phone.js"></script>
   <script src="/assets/vendor/libs/jquery-repeater/jquery-repeater.js"></script>

   <!-- Main JS -->
   <script src="/assets/js/main.js"></script>

   <!-- Page JS -->
   <script src="/assets/js/offcanvas-send-invoice.js"></script>
   <script src="/assets/js/app-invoice-add.js"></script>
<script type="text/javascript">
    // Select all date inputs
    const flatpickrDates = document.querySelectorAll('.quicky-date');

    // Apply flatpickr to each date input
    flatpickrDates.forEach(function(flatpickrDate) {
        flatpickrDate.flatpickr({
            monthSelectorType: 'static'
        });
    });

    // Select all time inputs
    const flatpickrTimes = document.querySelectorAll('.quicky-time');

    // Apply flatpickr to each time input
    flatpickrTimes.forEach(function(flatpickrTime) {
        flatpickrTime.flatpickr({
            enableTime: true,
            noCalendar: true,
            time_24hr:true
        });
    });
</script>
@stop
