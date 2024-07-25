

export interface CreateUpdateEventDataServiceRequest {
  start_time: string,
  end_time: string,
  user_id: number,
  project_id: number,
  rate_id: number,
  task_id: number,
  notes: string,
  // Remove the extra closing curly brace
}

export interface EventDataService {
  id: number,
  start_time: string,
  end_time: string,
  user: object,
  project: Object,
  rate: Object,
  task_id: number,
  notes: string,
}
interface ApiError {
  message: string
  status: number
}

export interface error {
  message: string
  status: number
}

