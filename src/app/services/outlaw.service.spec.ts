import { TestBed } from '@angular/core/testing';

import { OutlawService } from './outlaw.service';

describe('OutlawService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: OutlawService = TestBed.get(OutlawService);
    expect(service).toBeTruthy();
  });
});
