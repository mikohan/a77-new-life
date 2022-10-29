import axios from 'axios';
import Vue from '../vendor/vue/vue.min';
import { shoppingCart } from './shoppingCart';
import { displayCart } from './shoppingCart';
/**
 * Vie file
 */
//config part
const server_url = 'https://angara77.ga';
var app = new Vue({
  el: '#app',
  data() {
    return {
      //////////
      apiUrl: {},
      browserUrl: {},
      // apiUrl: 'http://localhost:8000/api/product/jsontest-angara77',
      defaultApiUrl: `${server_url}/api/product/jsontest-angara77?page_from=0&page_size=20`,

      message: 'Hello Vue!',
      model: 'porter1',
      category: 'tormoznaja-sistema',
      products: [],
      aggregations: [],
      isLoadingProduct: false,

      filters: {
        brand: [],
        min_price: 0,
        max_price: 0,
        car_models: [],
        bages: [],
        category: [],
        condition: [],
        has_photo: '',
        engine: [],
      },
      filtersChecked: {
        brand: [],
        min_price: 0,
        max_price: 0,
        car_models: [],
        bages: [],
        category: [],
        condition: [],
        has_photo: [],
        engine: [],
      },

      products_total_count: 0,
      possibleFilters: [
        'brand',
        'car_models',
        'engine',
        'has_photo',
        'bages',
        'condition',
        'category',
        'page_from',
        'page_size',
      ],
    };
  },
  methods: {
    addToCart(name, price, image, sku) {
      shoppingCart.addItemCart(name, price, 1, image, sku);
      displayCart();
    },
    setUrl() {
      // Initial setup for api url based on browser url

      const browserUrl = new URL(window.location.href);
      let apiUrl = new URL(`${server_url}/api/product/jsontest-angara77`);

      // Setting up model and category slug
      const [_a, _b, category] = browserUrl.pathname.split('/');
      console.log(category);
      // this.model = model;
      this.category = category;

      // Syncronizint browser url and api url
      if (category) {
        apiUrl.searchParams.set('category', category);
      }
      // let page_from = null;
      // let page_size = 20;

      // if (browserUrl.searchParams.has('page_from')) {
      // 	page_from = browserUrl.searchParams.get('page_from');
      // }
      // if (browserUrl.searchParams.has('page_size')) {
      // 	page_from = browserUrl.searchParams.get('page_size');
      // }

      if (browserUrl.searchParams) {
        // Adding params
        browserUrl.searchParams.forEach((value, key) => {
          if (this.possibleFilters.includes(key)) {
            apiUrl.searchParams.append(key, value);
          }
        });
      }
      console.log(apiUrl);
      // Setting up browserUrl and apiUrl in state
      this.apiUrl = apiUrl;

      this.browserUrl = browserUrl;
      browserUrl.searchParams.forEach((value, filter) => {
        // Page working here
        if (
          browserUrl.searchParams.has('page_from') ||
          browserUrl.searchParams.has('page_size')
        ) {
          return;
        }

        if (browserUrl.searchParams.has(filter)) {
          this.filtersChecked[filter].push(value);
        }
      });
    },
    async setUpFilters() {
      // Initial setup filters for particular car model and category
      const url = new URL(this.apiUrl);
      url.searchParams.forEach((value, key) => {
        url.searchParams.delete(key);
      });
      url.searchParams.set('page_from', 0);
      url.searchParams.set('page_size', 1);
      //url.searchParams.set('model', this.model);
      url.searchParams.set('category', this.category);
      const result = await this.getProducts(url);

      const ag = result.data.aggregations;
      this.filters.brand = ag.brands.buckets;
      this.filters.has_photo = ag.has_photo.buckets;
      this.filters.car_models = ag.car_models.buckets;
      this.filters.min_price = ag.min_price.value ?? 0;
      this.filters.max_price = ag.max_price.value ?? 10000;
      this.filters.bages = ag.bages.buckets;
      this.filters.category = ag.categories.buckets;
      this.filters.engine = ag.engines.buckets;
      this.filters.condition = ag.condition.buckets;
    },

    ////////////////////////////////////////////////////////////////////////////////

    updateState(result) {
      // Updating state exclude current filter
      this.products = result.data.hits.hits;
    },
    async showAllPhotos() {
      let url = new URL(this.apiUrl);
      if (url.searchParams.has('has_photo')) {
        url.searchParams.delete('has_photo');
      }
      const result = await this.getProducts(url);

      this.updateState(result);
      this.url = url;
    },

    getProducts(url) {
      // Commin function for getting api calls
      try {
        const result = axios.get(url);
        return result;
      } catch (error) {
        console.error(error);
        this.errorsMessages.push({
          message: error.response,
        });
        throw error;
      }
    },
    async updateCheckFilters(filter = 'brand') {
      const url = new URL(this.apiUrl);
      //Clear up existing filters
      url.searchParams.delete(filter);

      if (filter === 'has_photo') {
        url.searchParams.delete(filter);
        url.searchParams.set(filter, this.filtersChecked[filter]);
      } else {
        if (this.filtersChecked[filter].length) {
          this.filtersChecked[filter].forEach((el) => {
            if (url.searchParams.has(filter)) {
              url.searchParams.append(filter, el);
            } else {
              url.searchParams.set(filter, el);
            }
          });
        } else {
          if (url.searchParams.has(filter)) {
            url.searchParams.delete(filter);
          }
        }
      }

      this.apiUrl = url;
      let localBrowserUrl = new URL(url);
      localBrowserUrl.searchParams.delete('category');
      //localBrowserUrl.searchParams.delete('model');

      window.history.replaceState(
        { foo: 'bar' },
        'dummy',
        `?${localBrowserUrl.searchParams}`
      );

      // Getting products
      const result = await this.getProducts(url);
      this.updateState(result);
    },
    async clearFilterAll() {
      // Clear all filters

      window.history.replaceState(null, null, window.location.pathname);
      const url = new URL(this.apiUrl);
      url.searchParams.forEach((value, key) => {
        url.searchParams.delete(key);
      });
      url.searchParams.set('category', this.category);
      // url.searchParams.set('model', this.model);

      for (const [key, value] of Object.entries(this.filtersChecked)) {
        this.filtersChecked[key] = [];
      }
      const result = await this.getProducts(url);
      this.updateState(result);

      this.apiUrl = url;
    },
    async clearFilter(filter) {
      const url = new URL(this.apiUrl);
      //Clear up existing filters
      url.searchParams.delete(filter);

      if (filter === 'has_photo') {
        url.searchParams.delete(filter);
        this.filtersChecked[filter] = [];
      } else {
        if (url.searchParams.has(filter)) {
          url.searchParams.delete(filter);
        }
      }
      this.filtersChecked[filter] = [];

      this.apiUrl = url;
      localBrowserUrl = new URL(url);
      localBrowserUrl.searchParams.delete('category');
      // localBrowserUrl.searchParams.delete('model');

      window.history.replaceState(
        { foo: 'bar' },
        'dummy',
        `?${localBrowserUrl.searchParams}`
      );

      // Getting products
      const result = await this.getProducts(url);
      this.updateState(result);
    },
  },
  computed: {
    activeFilters() {
      // Check it tomorrow
      let active = [];
      const translate_filters = (key) => {
        const trans = {
          brand: 'Бренд',
          car_models: 'Модель',
          engine: 'Двигатель',
          has_photo: 'Фото',
          bages: 'Бейдж',
          condition: 'Состояние',
          category: 'Категория',
        };
        return trans[key];
      };

      const activeFilters = Object.keys(this.filtersChecked).forEach((key) => {
        if (key === 'has_photo') {
          if (!Array.isArray(this.filtersChecked[key])) {
            const val = this.filtersChecked[key][0] ? 'Есть' : 'Нет';
            active.push({
              eng: 'has_photo',
              filter: translate_filters('has_photo'),
              value: val,
            });
          }
        } else if (this.filtersChecked[key].length) {
          const k = translate_filters(key);
          this.filtersChecked[key].forEach((value) =>
            active.push({ eng: key, filter: k, value: value })
          );
        }
      });
      return active;
    },
  },
  async mounted() {
    this.setUrl();
    // console.log(this.apiUrl.toString(), 'Api Url');
    // console.log(this.browserUrl.toString(), 'Browser Url');
    this.isLoadingProduct = true;
    const result = await this.getProducts(this.apiUrl);
    this.products = result.data.hits.hits;
    await this.setUpFilters();

    // await this.getData();
    // await this.updateBrandFilter();

    // Loading products on load page
    // await this.getData();

    this.isLoadingProduct = false;
  },
});
