@extends('layouts.real-estate')

@section('content')
<div class="property-index">
  <div class="container-fluid">
    <section class="hero" >
      <div class="row">
        <div class="col-sm-12 col-md-8 col-lg-6 mx-auto">
          <div class="hero-caption">
            <div>
              <h2 class="caption-text">Looking for a home loan?<br>Let Trulia be your guide.</h2>
              <br>
              <form action="" method="GET">
                <div class="hero-search-bx">
                    <input type="text" placeholder="44600" name="property" class="navbar-search-input">
                    <button type="submit" class="hero-search-button">
                      <span class="text-light text-bold"> Get Pre-Qualified </span>
                    </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="mortage-tools-section py-5">
      <div class="container text-center">
        <h2 class="tools-hdr">Try our helpful Mortage Tools</h2>
        <p class="tools-para lead">Overwhelmed by mortgages? Don't sweat it. Here are some tools to help make it a little easier.</p>
        <div class="row text-center">
          <div class="col-sm-6 col-md-4">
            <a class="card card-borderless" href="#">
              <i class="fas fa-piggy-bank fa-3x fa-primary w-auto"></i>
              <div class="card-body">
                <button class="primary-btn">Affordability Calculator</button>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-4">
            <a class="card card-borderless" href="#">
              <i class="fas fa-calculator fa-3x fa-primary"></i>
              <div class="card-body">
                <button class="primary-btn">Mortage Calculator</button>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-4">
            <a class="card card-borderless" href="#">
              <i class="fas fa-project-diagram fa-3x fa-primary"></i>
              <div class="card-body">
                <button class="primary-btn">Rent vs Buy Calculator</button>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-4">
            <a class="card card-borderless more-tools" href="#">
              <i class="fas fa-balance-scale fa-3x fa-primary"></i>
              <div class="card-body">
                <button class="primary-btn">Refinance Calculator</button>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-4">
            <a class="card card-borderless more-tools" href="#">
              <i class="fas fa-portrait fa-3x fa-primary"></i>
              <div class="card-body">
                <button class="primary-btn">Lender Calculator</button>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-4" >
            <a class="card card-borderless more-tools" href="#">
              <i class="fas fa-chart-area fa-3x fa-primary"></i>
              <div class="card-body">
                <button class="primary-btn">Today's Mortage Calculator</button>
              </div>
            </a>
          </div>
        </div>
        <div class="more-tools-toggler text-align-center">
          <button id="moreToolsToggler" class="btn btn-light"><i class="fas fa-angle-down"></i> See more</button>
        </div>
      </div>
    </section>
    <section class="guides-section">
        <div class="tools-hdr text-center">See Today's National Average Interest Rates</div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-sm-12">
            <canvas id="ctx" height="200" width="300"></canvas>
          </div>
          <div class="col-lg-4 col-sm-6">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Load type</th>
                    <th>Today's Avg</th>
                    <th>Graph</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>30-Year Fixed</td>
                    <td>3.087%</td>
                    <td><input type="checkbox" checked disabled></td>
                  </tr>
                  <tr>
                    <td>15-Year Fixed</td>
                    <td>2.725%</td>
                    <td><input type="checkbox" checked disabled></td>
                  </tr>
                  <tr>
                    <td>5/1 ARM</td>
                    <td>2.973%</td>
                    <td><input type="checkbox" checked disabled></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="faq-section py-4">
      <div class="container">
        <div class="faq-hdr">
          <h2 class="page-header mb-4 text-center">Read the Most-Asked Mortage questions.</h2>
        </div>
        <div class="row">
          <div class="col-lg-10 col-sm-12 mx-auto ">
           <div class="accordion" id="accordionExample">
             
            <div class="card">
              <div class="card-header accordion-header">
                <h2 class="mb-0 faq-accordion-hdr" data-toggle="collapse" data-target="#collapseZero">
                  <p class="lead" >
                    How much do you need to put down a house? 
                  </p>
                  <i class="fas fa-chevron-down fas-text"></i>
                </h2>
              </div>
              <div id="collapseZero" class="collapse hide">
                <div class="card-body">
                  How much you put down depends on your goals and the type of loan you choose. Different loan types have different requirements. For example, an FHA loan requires at least 3.5% down, while a conventional loan requires at least 3%. Homeowners typically put down 10%, but 20% is often seen as ideal. Regardless of your loan type, there are clear advantages for putting more money down: it can lower your monthly payment, help you qualify for a better interest rate, and potentially help you avoid paying private mortgage insurance (PMI). Learn more about down payments.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header accordion-header">
                <h2 class="mb-0 faq-accordion-hdr" data-toggle="collapse" data-target="#collapseOne">
                  <p class="lead" >
                    How do I choose a mortgage lender?
                  </p>
                  <i class="fas fa-chevron-down fas-text"></i>
                </h2>
              </div>
              <div id="collapseOne" class="collapse hide">
                <div class="card-body">
                  When you need a mortgage it’s best to shop around and talk to at least three lenders to compare rates and explore different loan programs to find the right one for you. We offer a quick and easy way to find a lender in your area or compare rates from multiple lenders.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header accordion-header">
                <h2 class="mb-0 faq-accordion-hdr" data-toggle="collapse" data-target="#collapseTwo">
                  <p class="lead" >
                    How much mortgage can I afford?
                  </p>
                  <i class="fas fa-chevron-down fas-text"></i>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse hide">
                <div class="card-body">
                  To determine how much house you can afford, you can follow the 28/36 rule. This rule of thumb states that up to 28% of your monthly income should be spent on total housing expenses, and up to 36% should be spend on total debts, including your mortgage and other loans like car payments or student loans. You can also try our affordability calculator to estimate your mortgage affordability.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header accordion-header">
                <h2 class="mb-0 faq-accordion-hdr" data-toggle="collapse" data-target="#collapseThree">
                  <p class="lead" >
                    What is mortgage pre-qualification?
                  </p>
                  <i class="fas fa-chevron-down fas-text"></i>
                </h2>
              </div>
              <div id="collapseThree" class="collapse hide">
                <div class="card-body">
                  Getting pre-qualified is the first step in the mortgage process. It’s an initial assessment by a lender that states how much mortgage you may qualify for. You simply provide information about your income, debts and assets. It can give you a good idea of how much you can afford to spend on your home, and can show sellers that you’re a serious and credible buyer.
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header accordion-header">
                <h2 class="mb-0 faq-accordion-hdr" data-toggle="collapse" data-target="#collapseFour">
                  <p class="lead" type="button" >
                    How do I qualify to buy a home?
                  </p>
                  <i class="fas fa-chevron-down fas-text"></i>
                </h2>
              </div>
              <div id="collapseFour" class="collapse hide">
                <div class="card-body">
                  Lenders look at a number of factors when determining whether you qualify for a mortgage, including credit score, income, debts, and down payment amount. To see if you’ll qualify for a loan, you can speak with a local lender.
                </div>
              </div>
            </div>
           </div>
          </div>
        </div>
      </div>
    </section>
    <section class="download-app-section py-4">
      <div class="container">
        <div class="row text-center">
          <div class="col-lg-8 col-sm-12 my-4 mx-auto">
            <h2 class="page-header mb-2 text-white">
              Download Nepestate's Mortage App
            </h2>
            <p class="lead text-white">Calculate monthly payments and get rates on-the-go with our delightfully easy mortgage app.</p>
          </div>
        </div>
        <div class="download-app-platform">
          <a href="#" >
            <img alt="Apple App Store" class="download-pngs" src="{{asset('img/appstoredownload.png')}}">
          </a>
          <a href="#">
            <img alt="PlayStore"class="download-pngs" src="{{asset('img/playstoredownload.png')}}">
          </a>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection


@push('js')
<script>
$(document).ready(function(){
  $('#moreToolsToggler').click(function(){
    $('.more-tools').toggle();
    $(this).text() === 'Show less' ? $(this).text('Show more') : $(this).text('Show less');
  });

//chart js integration
  let CHART = document.getElementById('ctx');
  let data= {
    labels:["jan","feb","mar","apr","may","june","july","august","sep","oct","nov","dec"],
    datasets:[
       {
        label:"30-Year Fixed",
        fill:false,
        lineTension:.2,
        borderColor:'#08B795',
        borderWidth: 2,
        data:[4.38,4.72,4.47,4.06,4.00,3.69,3.72,3.99,4.25,4.2,3.55,3.21],
        },
        {
        label:"15-Year Fixed",
        fill:false,
        lineTension:.2,
        borderColor:'#ED1B77',
        borderWidth: 2,
        data:[3.92,4.06,4.02,3.80,3.90,3.95,4.25,4.11,3.70,3.45,3.35,2.99],
        },
        {
        label:"5/1 ARM",
        fill:false,
        lineTension:.2,
        borderColor:'#FF7857',
        borderWidth: 2,
        data:[3.78,4.07,4.01,3.73,3.65,3.25,3.15,2.95,2.64,2.52,2.31,2.41],
        },
      ]
    };

  var myLineChart = new Chart(CHART,{
    type:'line',
    data:data,
    options:{
      title: {
            display: true,
            text: 'Mortgage rates can change daily. Checkout the average rate trends over the last year.'
        }
    }
  });
})
</script>
@endpush


@push('css')
<style>
.hero{
  background-image: url('{{asset("img/hero2.jpg")}}');
}
.card-borderless{
  border:none;
  background-color:transparent;
  padding:2rem 0;
}
.tools-hdr{
  font-size:2rem;
  padding-bottom:1.5rem;
}
.more-tools{
  display:none;
}
.accordion-header{
  cursor:pointer;
}

.download-app-section{
  background: linear-gradient(to bottom right,#01ADBB,#FF7857);
}
.download-app-platform{
  display: flex;
  justify-content: center;
  align-items: center;
}
.download-pngs{
  width:10rem;
  height:auto;
  margin: 2rem;
}
.fas-text{
  font-size:1.25rem;
  color:grey;
}
.faq-accordion-hdr{
  display:flex;
  justify-content: space-between;
  align-items: center;
}
</style>
@endpush

