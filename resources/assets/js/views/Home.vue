<template>
	<div class="div">
	  <header>
	      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	        <div class="container">
	          <div class="collapse navbar-collapse" id="navbarCollapse">
	            <ul class="navbar-nav mr-auto">
	              <li class="nav-item active">
	                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	              </li>
	              <li class="nav-item">
	                <a class="nav-link" href="#" title="This is the rules of app">Rules</a>
	              </li>
	              <li class="nav-item">
	                <a class="nav-link" href="#">Contact</a>
	              </li>
	            </ul>
	          </div>
	        </div>
	      </nav>
	    </header>

	    <div class="main">
	        <div class="row justify-content-center">
	            <div class="col-md-12">
	                <div class="card card-default">
	                    <div class="card-header">Welcome to my app</div>

	                    <div class="card-body">
	                        <h4>Please enter the input to have fun !</h4><hr>
	                        <div class="row">
	                            <div class="col-5"><strong>Enter Text</strong></div>
	                            <div class="col-7">
	                                <input type="text" class="form-control" placeholder="Type your Text ..." v-model="text">
	                            </div>
	                        </div>
	                        <div class="row mt-10">
	                            <div class="col-5"><strong>Enter Sub Text</strong></div>
	                            <div class="col-7">
	                                <input type="text" class="form-control" placeholder="Type your sub-text ..." v-model="sub_text">
	                            </div>
	                        </div>
	                        <div class="row mt-10">
	                            <div class="col-5"></div>
	                            <div class="col-2">
	                                
	                                <button class="btn btn-primary" @click.prevent="getTheSearchResult">Click to get the result</button>
	                            </div>
	                        </div><hr>

	                        <div class="row">
	                            <div class="col-4"><p>The text: </p></div>
	                            <div class="col-8 text-danger">{{this.text_result}}</div>
	                        </div>

	                        <div class="row">
	                            <div class="col-4">The sub - text: </div>
	                            <div class="col-8 text-success">{{this.sub_text_result}}</div>
	                        </div><br>

	                        <div class="row">
	                            <div class="col-4">The matching positions: </div>
	                            <div class="col-8">{{ result }}</div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</template>

<script>
	import axios from 'axios'
    export default {
        data() {
            return {
                name: 'Le Van Toan',
                disabledButton: true,
                text: '',
                sub_text: '',
                result: '',
                text_result: '',
                sub_text_result: '',
                index: '',
            }
        },
        created(){
            // this.disabledBtn()
        },

         methods: {
            getTheSearchResult(){
 				const data = {
 					name: this.name,
 					text: this.text,
 					sub_text: this.sub_text,
 					result: this.result,
 					sub_text_result: this.sub_text_result
 				}
 				if(data.text == '' || data.sub_text == ''){
 					alert('Please enter Text and Sub text');
 					return false;
 				}
                axios.post(`/api/get-search-result`, data).then(response => {
                	let rs = response.data
                	rs = rs.join()
                	this.result = rs
                	this.text_result = data.text;
                	this.sub_text_result = data.sub_text
                });
            }

        }
    }
</script>

<style scoped>

    .main {
        margin-top: 60px;
    }

    .mt-10{
        margin-top: 10px;
    }
    
</style>