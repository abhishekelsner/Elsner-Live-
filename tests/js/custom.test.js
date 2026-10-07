const path = require('path');

describe('custom.js', () => {
  let handlers = {};
  let mockJQuery;

  beforeEach(() => {
    handlers = {};
    global.window = {
      open: jest.fn(),
      addEventListener: jest.fn(),
    };
    global.MutationObserver = class {
      observe() {}
      disconnect() {}
    };

    const createChain = () => {
      const chain = {};
      chain.on = jest.fn((event, ...args) => {
        const handler = typeof args[0] === 'function' ? args[0] : args[1];
        handlers[event] = handler;
        return chain;
      });
      chain.click = jest.fn((handler) => {
        handlers['click'] = handler;
        return chain;
      });
      chain.ready = jest.fn((fn) => {
        if (fn) fn(mockJQuery);
        return chain;
      });
      chain.slick = jest.fn(() => chain);
      chain.toggleClass = jest.fn(() => chain);
      chain.toggle = jest.fn(() => chain);
      chain.hide = jest.fn(() => chain);
      chain.show = jest.fn(() => chain);
      chain.slideUp = jest.fn((cb) => { if (cb) cb(); return chain; });
      chain.slideToggle = jest.fn(() => chain);
      chain.html = jest.fn(() => chain);
      chain.text = jest.fn(() => '');
      chain.val = jest.fn(() => '');
      chain.attr = jest.fn(() => '');
      chain.data = jest.fn(() => '');
      chain.find = jest.fn(() => chain);
      chain.prev = jest.fn(() => chain);
      chain.next = jest.fn(() => chain);
      chain.siblings = jest.fn(() => chain);
      chain.parents = jest.fn(() => chain);
      chain.closest = jest.fn(() => chain);
      chain.children = jest.fn(() => chain);
      chain.first = jest.fn(() => chain);
      chain.last = jest.fn(() => chain);
      chain.eq = jest.fn(() => chain);
      chain.addClass = jest.fn(() => chain);
      chain.removeClass = jest.fn(() => chain);
      chain.hasClass = jest.fn(() => false);
      chain.is = jest.fn(() => false);
      chain.width = jest.fn(() => 1200);
      chain.height = jest.fn(() => 800);
      chain.scrollTop = jest.fn(() => 0);
      chain.scroll = jest.fn(() => chain);
      chain.resize = jest.fn(() => chain);
      chain.each = jest.fn(() => chain);
      chain.offset = jest.fn(() => ({ top: 100, left: 100 }));
      chain.css = jest.fn(() => chain);
      chain.outerHeight = jest.fn(() => 100);
      chain.outerWidth = jest.fn(() => 100);
      chain.length = 0;
      return chain;
    };

    mockJQuery = jest.fn((selector) => {
      const chain = createChain();
      if (typeof selector === 'string') {
        handlers[selector] = chain;
      }
      return chain;
    });

    mockJQuery.ready = jest.fn((fn) => fn(mockJQuery));
    mockJQuery.fn = {};

    global.jQuery = function (selector) {
      if (typeof selector === 'function') {
        selector(mockJQuery);
        return mockJQuery;
      }
      return mockJQuery(selector);
    };
    global.jQuery.ready = (fn) => fn(mockJQuery);
    global.$ = global.jQuery;
    global.document = {
      addEventListener: jest.fn(),
      getElementById: jest.fn(() => ({
        addEventListener: jest.fn(),
        classList: { add: jest.fn(), remove: jest.fn() },
        style: {}
      })),
      querySelector: jest.fn(() => null),
      querySelectorAll: jest.fn(() => [])
    };
  });

  afterEach(() => {
    jest.resetModules();
  });

  test('wright_review click opens google review with secure window features', () => {
    const customJsPath = path.resolve(__dirname, '../../themes/Elsner-Revemp/src/js/custom.js');
    require(customJsPath);

    // Verify .wright_review click handler was registered
    const wrightReviewObj = handlers['.wright_review'];
    expect(wrightReviewObj).toBeDefined();
    expect(wrightReviewObj.click).toHaveBeenCalled();

    // Call the click handler passed to .wright_review
    const clickHandler = wrightReviewObj.click.mock.calls[0][0];
    expect(typeof clickHandler).toBe('function');

    clickHandler();

    expect(global.window.open).toHaveBeenCalledWith(
      'https://g.page/r/CajOGNhGyszeEB0/review',
      '_blank',
      'width=600,height=400,noopener,noreferrer'
    );
  });
});
